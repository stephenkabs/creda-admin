<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organization = $user->organization;

        abort_if(!$organization, 403);

        $query = Loan::query()
            ->whereHas('client', function ($q) use ($organization) {
                $q->where('organization_id', $organization->id);
            })
            ->with([
                'client:id,first_name,last_name,nrc,organization_id',
                'branch:id,name',
            ]);

        /* ===============================
           FILTERS (Accounting-ready)
        =============================== */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        if ($request->filled('branch_id')) {
            $query->where('branch_id', $request->branch_id);
        }

        $loans = $query
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organization->id,
                'count' => $loans->count(),
            ],
            'data' => $loans->through(function ($loan) {
                return [
                    'id' => $loan->id,
                    'reference' => $loan->slug,
                    'status' => $loan->status,

                    'amount' => $loan->amount,
                    'interest' => $loan->interest,
                    'total' => $loan->total,
                    'monthly_payment' => $loan->monthly_payment,
                    'months' => $loan->months,

                    'client' => [
                        'id' => $loan->client->id,
                        'name' => $loan->client->first_name . ' ' . $loan->client->last_name,
                        'nrc' => $loan->client->nrc,
                    ],

                    'branch' => $loan->branch?->name,

                    'created_at' => $loan->created_at->toDateString(),
                ];
            }),
        ]);
    }

    public function show(Loan $loan, Request $request)
    {
        $organization = $request->user()->organization;

        abort_if(
            $loan->client->organization_id !== $organization->id,
            403
        );

        $loan->load(['client', 'branch', 'repaymentSchedules']);

        return response()->json([
            'success' => true,
            'data' => $loan,
        ]);
    }
}
