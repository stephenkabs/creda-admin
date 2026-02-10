@extends('layouts.app')
@include('core.roles.style')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h3 class="apple-title">{{ ucfirst($role->name) }} Role</h3>
        <p class="apple-subtitle">Manage permissions for this role</p>
    </div>
</div>

<form method="POST" action="{{ route('roles.update', $role) }}">
@csrf
@method('PUT')

<div class="apple-card mb-4">
    <div class="card-body p-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <label class="form-label fw-semibold mb-0">
        Permissions
    </label>

    <button type="button"
            class="btn btn-sm btn-outline-dark rounded-pill"
            data-bs-toggle="modal"
            data-bs-target="#addPermissionModal">
        + Add Permission
    </button>
</div>


        @include('core.roles._permissions', [
            'permissions' => $permissions,
            'role' => $role
        ])

    </div>
</div>

<div class="text-end">
    <button class="btn btn-dark rounded-pill px-4">
        Save Changes
    </button>
</div>

</form>
<!-- ADD PERMISSION MODAL -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content apple-card p-4">

            <h5 class="apple-title mb-1">Add Permission</h5>
            <p class="apple-subtitle mb-3">
                Create a new permission and attach it to this role
            </p>

            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf

                <input type="hidden" name="role_id" value="{{ $role->id }}">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Permission Name</label>
                    <input type="text"
                           name="name"
                           class="form-control apple-input"
                           placeholder="e.g. create branches"
                           required>
                    <small class="text-muted">
                        Use lowercase words, e.g. <code>view loans</code>
                    </small>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="button"
                            class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-dark rounded-pill px-4">
                        Add Permission
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
