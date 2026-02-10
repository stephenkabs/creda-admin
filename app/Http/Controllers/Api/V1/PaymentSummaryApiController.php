<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class PaymentSummaryApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organizationId = $user->organization_id;

        $loans = Loan::whereHas('client', function ($q) use ($organizationId) {
                $q->where('organization_id', $organizationId);
            })
            ->with('client:id,first_name,last_name,nrc')
            ->withSum('payments as total_paid', 'amount')
            ->get()
            ->map(function ($loan) {
                $totalPaid = $loan->total_paid ?? 0;

                return [
                    'loan_id'      => $loan->id,
                    'reference'    => $loan->reference,
                    'loan_amount' => (float) $loan->amount,
                    'total_paid'  => (float) $totalPaid,
                    'balance'     => max($loan->amount - $totalPaid, 0),
                    'status'      => ($loan->amount - $totalPaid) > 0 ? 'active' : 'cleared',

                    'client' => [
                        'name' => trim($loan->client->first_name.' '.$loan->client->last_name),
                        'nrc'  => $loan->client->nrc,
                    ],
                ];
            });

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organizationId,
                'count' => $loans->count(),
            ],
            'data' => $loans,
        ]);
    }
}
