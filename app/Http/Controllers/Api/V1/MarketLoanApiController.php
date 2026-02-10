<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MarketLoan;
use Illuminate\Http\Request;

class MarketLoanApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organization = $user->organization;

        abort_if(!$organization, 403);

        $query = MarketLoan::query()
            ->where('organization_id', $organization->id)
            ->with([
                'client:id,first_name,last_name,phone,nrc',
                'branch:id,name',
            ]);

        /* ===============================
           TIME FILTERS
        =============================== */

        if ($request->filter === 'daily') {
            $query->whereDate('created_at', today());
        }

        if ($request->filter === 'weekly') {
            $query->whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ]);
        }

        if ($request->filter === 'monthly') {
            $query->whereMonth('created_at', now()->month)
                  ->whereYear('created_at', now()->year);
        }

        /* ===============================
           DATE RANGE
        =============================== */
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        /* ===============================
           PHONE / NRC SEARCH
        =============================== */
        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('client', function ($q) use ($search) {
                $q->where('phone', 'like', "%{$search}%")
                  ->orWhere('nrc', 'like', "%{$search}%");
            });
        }

        /* ===============================
           STATUS
        =============================== */
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $loans = $query
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organization->id,
                'count' => $loans->count(),
                'filters' => $request->only([
                    'filter', 'from_date', 'to_date', 'search', 'status'
                ]),
            ],
            'data' => $loans->through(function ($loan) {
                return [
                    'id' => $loan->id,
                    'reference' => $loan->slug,
                    'status' => $loan->status,

                    'principal' => $loan->principal_amount,
                    'interest_rate' => $loan->interest_rate,
                    'interest_amount' => $loan->interest_amount,
                    'total_payable' => $loan->total_payable,
                    'daily_payment' => $loan->daily_payment,
                    'repayment_days' => $loan->repayment_days,

                    'paid_amount' => $loan->paid_amount,
                    'balance' => $loan->balance,

                    'penalty_per_day' => $loan->penalty_per_day,
                    'penalty_amount' => $loan->penalty_amount,

                    'dates' => [
                        'start' => $loan->payment_start_date?->toDateString(),
                        'end'   => $loan->end_date?->toDateString(),
                        'created_at' => $loan->created_at->toDateString(),
                    ],

                    'client' => [
                        'id'    => $loan->client->id,
                        'name'  => $loan->client->first_name . ' ' . $loan->client->last_name,
                        'phone' => $loan->client->phone,
                        'nrc'   => $loan->client->nrc,
                    ],

                    'branch' => $loan->branch?->name,
                ];
            }),
        ]);
    }

    /* ===============================
       SINGLE MARKET LOAN
    =============================== */
    public function show(MarketLoan $marketLoan, Request $request)
    {
        $organization = $request->user()->organization;

        abort_if(
            $marketLoan->organization_id !== $organization->id,
            403
        );

        $marketLoan->load([
            'client',
            'branch',
            'payments' => fn ($q) => $q->latest(),
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'loan' => $marketLoan,
                'payments' => $marketLoan->payments,
            ],
        ]);
    }
}
