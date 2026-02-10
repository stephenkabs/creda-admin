@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0">Packages</h4>

    <a href="{{ route('admin.packages.create') }}"
       class="btn btn-dark rounded-pill">
        + New Package
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">

        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Users</th>
                    <th>Borrowers</th>
                    <th>SMS</th>
                    <th>API</th>
                    <th>Status</th>
                    <th width="120"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td class="fw-semibold">{{ $package->name }}</td>
                    <td>K{{ number_format($package->price) }}</td>
                    <td>{{ $package->max_users }}</td>
                    <td>{{ $package->max_borrowers }}</td>
                    <td>{{ $package->sms_limit ?? 'Unlimited' }}</td>
                    <td>
                        @if($package->api_access)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        @if($package->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Disabled</span>
                        @endif
                    </td>
<td class="text-end">
    <div class="d-inline-flex gap-2">
        <a href="{{ route('admin.packages.edit', $package) }}"
           class="btn btn-sm btn-outline-dark rounded-pill">
            Edit
        </a>

        <button type="button"
                class="btn btn-sm btn-outline-danger rounded-pill"
                data-bs-toggle="modal"
                data-bs-target="#appleDeleteModal"
                data-delete-url="{{ route('admin.packages.destroy', $package) }}">
            Delete
        </button>
    </div>
</td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
{{-- ================= APPLE DELETE MODAL ================= --}}
<div class="modal fade" id="appleDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content apple-delete-modal p-4">

            {{-- ICON --}}
            <div class="text-center mb-3">
                <div class="apple-delete-icon">
                    <i class="fas fa-trash"></i>
                </div>
            </div>

            {{-- TITLE --}}
            <h5 class="fw-bold text-center mb-1">
                Delete Package?
            </h5>

            {{-- MESSAGE --}}
            <p class="text-muted text-center small mb-4">
                This package will be permanently removed.
                Existing subscriptions may be affected.
            </p>

            {{-- FORM --}}
            <form method="POST" id="appleDeleteForm">
                @csrf
                @method('DELETE')

                <div class="d-flex justify-content-center gap-3">
                    <button type="button"
                            class="btn btn-light rounded-pill px-4"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-danger rounded-pill px-4">
                        Yes, Delete
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
