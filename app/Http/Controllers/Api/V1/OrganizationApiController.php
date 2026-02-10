<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationApiController extends Controller
{
    public function show(Request $request)
    {
        $org = $request->user()->organization;

        abort_if(!$org, 403);

        return response()->json([
            'success' => true,
            'data' => [
                'id'       => $org->id,
                'name'     => $org->name,
                'type'     => $org->type,
                'email'    => $org->email,
                'phone'    => $org->phone,
                'address'  => $org->address,
                'country'  => $org->country,
                'currency' => $org->currency,

                // Accounting friendly
                'legal_entity_name' => $org->name,
                'external_id'       => 'ORG-'.$org->id,

                'created_at' => $org->created_at->toDateString(),
            ],
        ]);
    }
}
