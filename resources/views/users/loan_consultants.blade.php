@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Loan Consultants</h3>
            <p class="text-muted mb-0">
                Consultants assigned to branches and managing loans
            </p>
        </div>

        <a href="{{ route('user.create') }}"
           class="btn btn-danger rounded-pill px-4">
            <i class="fas fa-user-plus me-1"></i> New Consultant
        </a>
    </div>

    {{-- SEARCH --}}
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <form method="GET">
                <div class="input-group">
                    <span class="input-group-text bg-white border-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text"
                           name="q"
                           value="{{ request('q') }}"
                           class="form-control border-0 fw-semibold"
                           placeholder="Search consultant by name or email">
                    <button class="btn btn-dark rounded-pill px-4">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- CONSULTANTS TABLE --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Consultant</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                @forelse($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>

                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td class="text-muted">
                            {{ $user->email }}
                        </td>

                        <td>
                            @if($user->branch)
                                <span class="badge bg-light text-dark rounded-pill px-3">
                                    {{ $user->branch->name }}
                                </span>
                            @else
                                <span class="badge bg-warning text-dark rounded-pill px-3">
                                    No Branch
                                </span>
                            @endif
                        </td>

                        <td>
                            <span class="badge bg-primary rounded-pill px-3">
                                Loan Consultant
                            </span>
                        </td>

                        <td class="text-muted">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td class="text-end">
                            <a href="{{ route('user.edit', $user) }}"
                               class="btn btn-sm btn-outline-dark rounded-pill px-3">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No loan consultants found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    @if($users->hasPages())
        <div class="mt-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @endif

</div>

@endsection
