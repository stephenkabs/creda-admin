<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organization = $user->organization;

        abort_if(!$organization, 403);

        $query = Expense::query()
            ->where('organization_id', $organization->id)
            ->with([
                'category:id,name',
                'branch:id,name',
            ]);

        /* ===============================
           PERIOD FILTERS
        =============================== */

        if ($request->period === 'daily') {
            $query->whereDate('expense_date', today());
        }

        if ($request->period === 'weekly') {
            $query->whereBetween('expense_date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ]);
        }

        if ($request->period === 'monthly') {
            $query->whereMonth('expense_date', now()->month)
                  ->whereYear('expense_date', now()->year);
        }

        if ($request->period === 'yearly') {
            $query->whereYear('expense_date', now()->year);
        }

        /* ===============================
           DATE RANGE
        =============================== */
        if ($request->filled('from_date')) {
            $query->whereDate('expense_date', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('expense_date', '<=', $request->to_date);
        }

        /* ===============================
           MONTH FILTER
        =============================== */
        if ($request->filled('month')) {
            $query->whereMonth('expense_date', $request->month);

            if ($request->filled('year')) {
                $query->whereYear('expense_date', $request->year);
            }
        }

        /* ===============================
           BRANCH FILTER
        =============================== */
        if ($request->filled('branch_id')) {
            $query->where('branch_id', $request->branch_id);
        }

        $expenses = $query->latest()->paginate(20);

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organization->id,
                'count' => $expenses->count(),
                'filters' => $request->only([
                    'period','from_date','to_date','month','year','branch_id'
                ]),
            ],
            'data' => $expenses->through(function ($expense) {
                return [
                    'id' => $expense->id,
                    'amount' => $expense->amount,
                    'description' => $expense->description,

                    'date' => $expense->expense_date,
                    'month' => \Carbon\Carbon::parse($expense->expense_date)->format('F'),

                    'category' => [
                        'id' => $expense->category->id,
                        'name' => $expense->category->name,
                    ],

                    'branch' => $expense->branch?->name,
                ];
            }),
        ]);
    }

    /* ===============================
       SINGLE EXPENSE
    =============================== */
    public function show(Expense $expense, Request $request)
    {
        $organization = $request->user()->organization;

        abort_if(
            $expense->organization_id !== $organization->id,
            403
        );

        $expense->load(['category','branch']);

        return response()->json([
            'success' => true,
            'data' => $expense,
        ]);
    }
}
