@extends('layouts.app')
@include('core.roles.style')

@section('content')
<div class="row mb-4">
    <div class="col d-flex justify-content-between align-items-center">
        <div>
            <h3 class="apple-title mb-1">Roles</h3>
            <p class="apple-subtitle">Manage organization roles and permissions</p>
        </div>

        <a href="{{ route('roles.create') }}"
           class="btn btn-dark rounded-pill px-4">
            + New Role
        </a>
    </div>
</div>

<div class="apple-card">
    <div class="card-body p-4">
        <table class="table align-middle">
            <thead>
                <tr class="text-muted small">
                    <th>Role</th>
                    <th>Permissions</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
                <tr>
                    <td>
                        <strong>{{ ucfirst($role->name) }}</strong>
                    </td>

                    <td class="text-muted">
                        {{ $role->permissions->count() }} permissions
                    </td>

                    <td class="text-end">
                        <a href="{{ route('roles.edit', $role) }}"
                           class="btn btn-sm btn-outline-dark rounded-pill">
                            Manage
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">
                        No roles created yet.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
