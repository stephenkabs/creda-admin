<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organizationId = $user->organization_id;

        $clients = Client::where('organization_id', $organizationId)
            ->when($request->branch_id, fn ($q) =>
                $q->where('branch_id', $request->branch_id)
            )
            ->when($request->status, fn ($q) =>
                $q->where('status', $request->status)
            )
            ->when($request->search, function ($q) use ($request) {
                $s = $request->search;
                $q->where(function ($sub) use ($s) {
                    $sub->where('first_name', 'like', "%{$s}%")
                        ->orWhere('last_name', 'like', "%{$s}%")
                        ->orWhere('phone', 'like', "%{$s}%")
                        ->orWhere('email', 'like', "%{$s}%")
                        ->orWhere('nrc', 'like', "%{$s}%");
                });
            })
            ->latest()
            ->paginate(20);

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organizationId,
                'count' => $clients->total(),
            ],
            'data' => $clients->through(fn ($client) => [
                'id' => $client->id,
                'external_id' => $client->reference_no, // 👈 accounting hook
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'full_name' => trim($client->first_name.' '.$client->last_name),
                'nrc' => $client->nrc,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->client_address,
                'status' => $client->status,
                'branch_id' => $client->branch_id,
                'created_at' => $client->created_at->toDateString(),
            ]),
        ]);
    }

    public function show(Request $request, Client $client)
    {
        abort_if(
            $client->organization_id !== $request->user()->organization_id,
            403
        );

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $client->id,
                'external_id' => $client->reference_no,
                'first_name' => $client->first_name,
                'last_name' => $client->last_name,
                'full_name' => trim($client->first_name.' '.$client->last_name),
                'nrc' => $client->nrc,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->client_address,
                'status' => $client->status,
                'branch_id' => $client->branch_id,
                'bank_name' => $client->bank_name,
                'bank_account' => $client->bank_account,
                'mobile_money' => $client->mobile_money,
                'created_at' => $client->created_at->toDateString(),
            ],
        ]);
    }
}
