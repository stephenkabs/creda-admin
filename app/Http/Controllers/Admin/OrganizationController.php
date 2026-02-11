<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Mail\OrganizationActivatedMail;
use App\Services\BrevoMailService;
use App\Models\User;
use Illuminate\Support\Facades\Mail;



class OrganizationController extends Controller
{
    /**
     * List all organizations (Admin global view)
     */
    public function index()
    {
        $organizations = Organization::with('creator')
            ->latest()
            ->paginate(20);

        $totals = [
            'all'      => Organization::count(),
            'active'   => Organization::where('active', 1)->count(),
            'inactive' => Organization::where('active', 0)->count(),
        ];

        return view('admin.organizations.index', compact(
            'organizations',
            'totals'
        ));
    }


    /**
     * View organization details
     */
    public function show(Organization $organization)
    {
        return view('admin.organizations.show', compact('organization'));
    }

    /**
     * Activate / deactivate organization
     */
public function toggleStatus(Organization $organization)
{
    $organization->update([
        'active' => ! $organization->active
    ]);

    if ($organization->active) {

        // use relationship first
        $user = $organization->creator;

        // fallback if old records
        if (!$user) {
            $user = User::where('organization_id', $organization->id)
                        ->first();
        }

        if ($user) {

            $html = view('emails.organization_activated', [
                'organization' => $organization,
                'user'         => $user
            ])->render();

            BrevoMailService::send(
                $user->email,
                'Organization Activated',
                $html
            );
        }
    }

    return back()->with('success','Organization status updated');
}






}
