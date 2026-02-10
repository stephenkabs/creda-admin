@extends('layouts.app')

@section('content')

@push('styles')
<style>
/* ===============================
   APPLE FOUNDATION
================================*/
body {
    background: #f5f6f8;
}

/* ===============================
   PAGE HEADER
================================*/
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
}

.page-title {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -0.03em;
}

.page-subtitle {
    color: #6b7280;
    font-size: 14px;
}

/* ===============================
   APPLE CARD
================================*/
.apple-card {
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(18px);
    border-radius: 26px;
    border: 1px solid rgba(229,231,235,.8);
    box-shadow:
        0 18px 40px rgba(0,0,0,.10),
        inset 0 1px 0 rgba(255,255,255,.8);
    transition: all .3s cubic-bezier(.4,0,.2,1);
}

.apple-card:hover {
    transform: translateY(-4px);
    box-shadow:
        0 32px 70px rgba(0,0,0,.16),
        inset 0 1px 0 rgba(255,255,255,.9);
}

/* ===============================
   AVATAR (INITIALS)
================================*/
.user-avatar {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 22px;
    font-weight: 900;
    letter-spacing: .1em;
    text-transform: uppercase;

    color: #fff;
    background: linear-gradient(135deg,#ef4444,#991b1b);

    box-shadow:
        0 12px 28px rgba(0,0,0,.28),
        inset 0 2px 4px rgba(255,255,255,.25);
}

/* ===============================
   USER TEXT
================================*/
.user-name {
    font-size: 16px;
    font-weight: 800;
    letter-spacing: -0.015em;
}

.user-email {
    font-size: 13px;
    color: #6b7280;
}

/* ===============================
   ROLE CHIP
================================*/
.role-chip {
    padding: 6px 16px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
    background: linear-gradient(180deg,#f9fafb,#f3f4f6);
    border: 1px solid rgba(0,0,0,.05);
    color: #374151;
}

/* ===============================
   ACTION BUTTONS
================================*/
.action-btn {
    border-radius: 999px;
    padding: 6px 16px;
    font-size: 13px;
    font-weight: 600;
}

/* ===============================
   EMPTY STATE
================================*/
.empty-state {
    padding: 80px 20px;
    text-align: center;
}

.empty-icon {
    font-size: 56px;
    color: #9ca3af;
}
</style>
@endpush

<div class="container py-4">

    {{-- ================= HEADER ================= --}}
    <div class="page-header">
        <div>
            <div class="page-title">System Users</div>
            <div class="page-subtitle">
                Manage administrators, consultants, and internal accounts
            </div>
        </div>

        <a href="{{ route('users.create') }}"
           class="btn btn-danger rounded-pill px-4 fw-semibold">
            <i class="mdi mdi-plus me-1"></i> New User
        </a>
    </div>

    {{-- ================= SEARCH ================= --}}
    <div class="mb-4">
        <form method="GET" action="{{ route('users.index') }}">
            <div class="apple-card p-2 d-flex align-items-center">
                <i class="mdi mdi-magnify text-muted ms-2"></i>
                <input type="text"
                       name="q"
                       value="{{ request('q') }}"
                       class="form-control border-0 shadow-none fw-semibold"
                       placeholder="Search by name or email">
                <button class="btn btn-danger rounded-pill px-4 ms-2">
                    Search
                </button>
            </div>
        </form>
    </div>

    {{-- ================= USERS GRID ================= --}}
    <div class="row g-4">

    @forelse($users as $user)

        @php
            $initials = strtoupper(
                substr($user->first_name,0,1) .
                substr($user->last_name,0,1)
            );
        @endphp

        <div class="col-lg-4 col-md-6">
            <div class="apple-card p-4 h-100 d-flex flex-column">

                {{-- USER HEADER --}}
                <div class="d-flex align-items-center mb-4">
                    {{-- <div class="user-avatar me-3">
                        {{ $initials }}
                    </div> --}}

                    <div>
                        <div class="user-name">
                            {{ $user->name }}
                        </div>
                        <div class="user-email">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>

                {{-- ROLES --}}
                <div class="mb-4">
                    @forelse($user->roles as $role)
                        <span class="role-chip me-1 mb-1 d-inline-block">
                            {{ ucfirst($role->name) }}
                        </span>
                    @empty
                        <span class="role-chip text-muted">
                            No role assigned
                        </span>
                    @endforelse
                </div>

                {{-- FOOTER --}}
                <div class="mt-auto d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Joined {{ $user->created_at->diffForHumans() }}
                    </small>

                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit',$user) }}"
                           class="btn btn-light action-btn">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('users.destroy',$user) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger action-btn"
                                    onclick="return confirm('Delete this user?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    @empty
        <div class="col-12">
            <div class="apple-card empty-state">
                <div class="empty-icon mb-3">
                    <i class="mdi mdi-account-off-outline"></i>
                </div>
                <h5 class="fw-bold">No users found</h5>
                <p class="text-muted mb-0">
                    Start by creating your first system user
                </p>
            </div>
        </div>
    @endforelse

    </div>

    {{-- ================= PAGINATION ================= --}}
    @if($users->hasPages())
        <div class="mt-5 d-flex justify-content-center">
           {{ $users->links('pagination::bootstrap-4') }}

        </div>
    @endif

</div>
@endsection
