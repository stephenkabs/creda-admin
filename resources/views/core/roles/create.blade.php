@extends('layouts.app')
@include('core.roles.style')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h3 class="apple-title">Create Role</h3>
        <p class="apple-subtitle">Define a new role for your organization</p>
    </div>
</div>

<form method="POST" action="{{ route('roles.store') }}">
@csrf

<div class="apple-card">
    <div class="card-body p-4">

        <div class="mb-4">
            <label class="form-label fw-semibold">Role Name</label>
            <input type="text"
                   name="name"
                   class="form-control apple-input"
                   placeholder="e.g. Loan Officer"
                   required>
        </div>

        <div class="text-end">
            <button class="btn btn-dark rounded-pill px-4">
                Create Role
            </button>
        </div>

    </div>
</div>
</form>
@endsection
