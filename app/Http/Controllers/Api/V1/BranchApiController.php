<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $organizationId = $user->organization_id;

        $branches = Branch::where('organization_id', $organizationId)
            ->when($request->active !== null, fn ($q) =>
                $q->where('is_active', (bool) $request->active)
            )
            ->with('manager:id,name,email')
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'meta' => [
                'organization_id' => $organizationId,
                'count' => $branches->count(),
            ],
            'data' => $branches->map(fn ($branch) => [
                'id' => $branch->id,
                'code' => $branch->code,
                'name' => $branch->name,
                'location' => $branch->location,
                'is_active' => (bool) $branch->is_active,

                // Accounting systems love this
                'external_id' => $branch->code,

                'manager' => $branch->manager ? [
                    'id' => $branch->manager->id,
                    'name' => $branch->manager->name,
                    'email' => $branch->manager->email,
                ] : null,

                'created_at' => $branch->created_at->toDateString(),
            ]),
        ]);
    }

    public function show(Request $request, Branch $branch)
    {
        abort_if(
            $branch->organization_id !== $request->user()->organization_id,
            403
        );

        $branch->load('manager:id,name,email');

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $branch->id,
                'code' => $branch->code,
                'name' => $branch->name,
                'location' => $branch->location,
                'is_active' => (bool) $branch->is_active,
                'external_id' => $branch->code,

                'manager' => $branch->manager ? [
                    'id' => $branch->manager->id,
                    'name' => $branch->manager->name,
                    'email' => $branch->manager->email,
                ] : null,

                'created_at' => $branch->created_at->toDateString(),
            ],
        ]);
    }
}
