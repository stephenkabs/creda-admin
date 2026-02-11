<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Services\BrevoMailService;
use App\Models\Branch;
 use App\Mail\InvitationMail;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrganizationUsersController extends Controller
{
    /**
     * List organization users
     */
    public function index()
    {
        $organizationId = auth()->user()->organization_id;

        $users = User::where('organization_id', $organizationId)
            ->latest()
            ->paginate(15);

        return view('organization.users.index', compact('users'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $organizationId = auth()->user()->organization_id;

        $roles = Role::where('organization_id', $organizationId)->get();

        return view('organization.users.create', compact('roles'));
    }

    /**
     * Store user
     */
public function store(Request $request)
{
    $organizationId = auth()->user()->organization_id;

    $data = $request->validate([
        'name'      => 'required|string|max:255',
        'email'     => 'required|email|unique:users,email',
        'role_id'   => 'required|exists:roles,id',
        'branch_id' => 'nullable|exists:branches,id',
    ]);

    DB::transaction(function () use ($data, $organizationId) {

        $token = Str::random(40);

        $user = User::create([
            'name'             => $data['name'],
            'email'            => $data['email'],
            'password'         => Hash::make(Str::random(12)), // temporary
            'organization_id'  => $organizationId,
            'branch_id'        => $data['branch_id'] ?? null,
            'invitation_token' => $token,
            'invited_at'       => now(),
        ]);

        $role = Role::findOrFail($data['role_id']);
        $user->assignRole($role);

        /*
        |----------------------------------
        | Send invitation email
        |----------------------------------
        */
        $inviteLink = route('invitation.accept', $token);



$html = InvitationMail::html($user, $inviteLink);

BrevoMailService::send(
    $user->email,
    'You are invited to join the organization',
    $html
);

    });

    return redirect()
        ->route('organization.users.index')
        ->with('success','Invitation sent successfully');
}


    /**
     * Edit
     */
    public function edit(User $user)
    {
        abort_if($user->organization_id != auth()->user()->organization_id, 403);

        $roles = Role::where('organization_id', auth()->user()->organization_id)->get();

        return view('organization.users.edit', compact('user','roles'));
    }

    /**
     * Update
     */
    public function update(Request $request, User $user)
    {
        abort_if($user->organization_id != auth()->user()->organization_id, 403);

        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$user->id",
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name'  => $data['name'],
            'email' => $data['email'],
        ]);

        $role = Role::findOrFail($data['role_id']);

        $user->syncRoles([$role]);

        return redirect()->route('organization.users.index')
            ->with('success','User updated');
    }

    /**
     * Delete
     */
    public function destroy(User $user)
    {
        abort_if($user->organization_id != auth()->user()->organization_id, 403);

        $user->delete();

        return back()->with('success','User deleted');
    }
}
