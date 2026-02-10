<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Role;
use App\Models\Package;
use Illuminate\Support\Str;
use App\Services\BrevoMailService;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Show institution setup form
     */
    public function create()
    {
        return view('onboarding.setup.institution');
    }


        public function finish()
    {
        $packages = Package::where('active', true)->get();
        return view('onboarding.setup.complete', compact('packages'));
    }


// public function store(Request $request)
// {
//     $data = $request->validate([
//         'name'     => 'required|string|max:255',
//         'type'     => 'required|string|max:100',
//         'email'    => 'nullable|email',
//         'phone'    => 'nullable|string|max:30',
//         'address'  => 'nullable|string|max:255',
//         'country'  => 'required|string|max:100',
//         'currency' => 'required|string|max:10',
//     ]);

//     $organization = null;

//     DB::transaction(function () use ($data, &$organization) {

//         // generate slug
//         $data['slug'] = Str::slug($data['name']) . '-' . uniqid();

//         $organization = Organization::create($data);

//         $user = Auth::user();

//         $user->update([
//             'organization_id' => $organization->id,
//         ]);

//         $this->seedDefaultRoles($organization);

//         $ownerRole = Role::where('organization_id', $organization->id)
//             ->where('name', 'owner')
//             ->firstOrFail();

//         $user->assignRole($ownerRole);
//     });

//     app(PermissionRegistrar::class)->forgetCachedPermissions();

//     /*
//     |--------------------------------------------------
//     | SEND EMAIL
//     |--------------------------------------------------
//     */
//     $user = Auth::user();

//     $html = view('emails.organization_created', [
//         'user' => $user,
//         'organization' => $organization
//     ])->render();

//     BrevoMailService::send(
//         $user->email,
//         'Organization Setup Successful',
//         $html
//     );

//     return redirect()->route('setup.package');
// }



public function store(Request $request)
{
    $data = $request->validate([
        'name'     => 'required|string|max:255',
        'type'     => 'required|string|max:100',
        'email'    => 'nullable|email',
        'phone'    => 'nullable|string|max:30',
        'address'  => 'nullable|string|max:255',
        'country'  => 'required|string|max:100',
        'currency' => 'required|string|max:10',
    ]);

    $organization = null;

    DB::transaction(function () use ($data, &$organization) {

        $user = Auth::user();

        $data['slug']       = Str::slug($data['name']) . '-' . uniqid();
        $data['created_by'] = $user->id;   // ✅ important

        $organization = Organization::create($data);

        $user->update([
            'organization_id' => $organization->id,
        ]);

        $this->seedDefaultRoles($organization);

        $ownerRole = Role::where('organization_id', $organization->id)
            ->where('name', 'owner')
            ->firstOrFail();

        $user->assignRole($ownerRole);
    });

    app(PermissionRegistrar::class)->forgetCachedPermissions();

    /*
    |--------------------------------------------------
    | SEND EMAIL
    |--------------------------------------------------
    */
    $user = Auth::user();

    $html = view('emails.organization_created', [
        'user' => $user,
        'organization' => $organization
    ])->render();

    BrevoMailService::send(
        $user->email,
        'Organization Setup Successful',
        $html
    );

    return redirect()->route('setup.package');
}

protected function seedDefaultRoles(Organization $organization): void
{
    $roles = [
        'owner' => [
            'manage roles',
            'manage permissions',
            'view organization settings',
            'update organization settings',
        ],
        'admin' => [
            'view organization settings',
            'update organization settings',
        ],
        'manager' => [
            'view organization settings',
        ],
        'loan_consultant' => [],
        'viewer' => [],
    ];

    foreach ($roles as $roleName => $permissions) {
        $role = Role::firstOrCreate([
            'name' => $roleName,
            'guard_name' => 'web',
            'organization_id' => $organization->id,
        ]);

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
    }
}



    /**
     * (Optional) Edit organization later
     */
    public function edit(Organization $organization)
    {
        return view('onboarding.setup.institution_edit', compact('organization'));
    }

    /**
     * (Optional) Update organization
     */
    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());

        return back()->with('status', 'Organization updated');
    }
}
