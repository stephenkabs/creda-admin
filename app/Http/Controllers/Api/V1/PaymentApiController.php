<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\LoanPayment;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organization = $user->organization;

        abort_if(!$organization, 403);

        $payments = LoanPayment::query()
            ->whereHas('loan.client', function ($q) use ($organization) {
                $q->where('organization_id', $organization->id);
            })
            ->with([
                'loan.client',
            ])
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organization->id,
                'count' => $payments->total(),
            ],
            'data' => $payments->through(function ($payment) {
                return [
                    'id'      => $payment->id,
                    'amount'  => (float) $payment->amount,
                    'paid_at' => $payment->paid_at?->toDateString(),

                    'loan' => [
                        'id'        => $payment->loan->id,
                        'reference' => $payment->loan->reference, // accessor ✅
                        'total'     => (float) $payment->loan->total,
                    ],

                    'client' => [
                        'name' => $payment->loan->client->first_name
                                .' '.$payment->loan->client->last_name,
                        'nrc'  => $payment->loan->client->nrc,
                    ],
                ];
            }),
        ]);
    }
}
