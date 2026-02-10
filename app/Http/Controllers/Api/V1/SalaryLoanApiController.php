<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SalaryLoan;
use Illuminate\Http\Request;

class SalaryLoanApiController extends Controller
{
    /* ======================================================
       LIST
    ====================================================== */
    public function index(Request $request)
    {
        $user = $request->user();
        $organization = $user->organization;

        abort_if(!$organization, 403);

        $query = SalaryLoan::query()
            ->where('organization_id', $organization->id)
            ->with([
                'client:id,first_name,last_name,nrc,phone',
                'branch:id,name',
            ]);

        /* ===============================
           FILTERS
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

        $loans = $query->latest()->paginate(20);

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
                    'loan_no' => $loan->loan_no,
                    'status' => $loan->status,

                    'loan_amount' => $loan->loan_amount,
                    'interest_rate' => $loan->interest_rate,
                    'months' => $loan->months,

                    'monthly_deduction' => $loan->monthly_deduction,
                    'total_payable' => $loan->total_payable,
                    'total_paid' => $loan->total_paid,
                    'outstanding_balance' => $loan->outstanding_balance,

                    'settlement_type' => $loan->settlement_label,

                    'client' => [
                        'id' => $loan->client->id,
                        'name' => $loan->client->first_name.' '.$loan->client->last_name,
                        'nrc' => $loan->client->nrc,
                        'phone' => $loan->client->phone,
                    ],

                    'branch' => $loan->branch?->name,

                    'created_at' => $loan->created_at->toDateString(),
                ];
            }),
        ]);
    }

    /* ======================================================
       SHOW
    ====================================================== */
    public function show(SalaryLoan $salaryLoan, Request $request)
    {
        $organization = $request->user()->organization;

        abort_if(
            $salaryLoan->organization_id !== $organization->id,
            403
        );

        $salaryLoan->load([
            'client',
            'branch',
            'payments',
            'penalties',
        ]);

        return response()->json([
            'success' => true,
            'data' => $salaryLoan,
        ]);
    }
}
