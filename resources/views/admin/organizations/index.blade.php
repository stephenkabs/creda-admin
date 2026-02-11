@extends('layouts.app')

@section('content')

<style>
/* ===============================
   🍎 APPLE CARD
================================ */
.apple-card{
    background:#ffffff;
    border-radius:24px;
    padding:26px;
    border:1px solid rgba(229,231,235,.9);
    box-shadow:
        0 12px 30px rgba(0,0,0,.05),
        0 40px 80px rgba(0,0,0,.06);
}

/* ===============================
   SUMMARY CARDS
================================ */
.summary-card{
    background:#ffffff;
    border-radius:20px;
    padding:20px;
    border:1px solid rgba(229,231,235,.9);
    box-shadow:0 10px 25px rgba(0,0,0,.04);
}

/* ===============================
   🍎 TABLE STYLE
================================ */
.apple-table{
    border-collapse:separate;
    border-spacing:0 12px;
}

.apple-table thead th{
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.08em;
    color:#6b7280;
    border:none;
    padding:12px 18px;
}

.apple-table tbody tr{
    background:#ffffff;
    border-radius:18px;
    box-shadow:0 6px 18px rgba(0,0,0,.06);
    transition:.25s;
}

.apple-table tbody tr:hover{
    transform:translateY(-3px);
    box-shadow:0 14px 30px rgba(0,0,0,.08);
}

.apple-table tbody td{
    padding:16px 18px;
    border:none;
}

/* Status pills */
.status-pill{
    padding:6px 14px;
    border-radius:999px;
    font-size:12px;
    font-weight:600;
}

.status-active{
    background:#ecfdf5;
    color:#059669;
}

.status-inactive{
    background:#fef2f2;
    color:#dc2626;
}
</style>


{{-- ================= HEADER ================= --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Organizations</h4>
        <small class="text-muted">Manage all organizations registered on the platform</small>
    </div>
</div>


{{-- ================= SUMMARY ================= --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="summary-card">
            <small class="text-muted">Total Organizations</small>
            <h4 class="fw-bold">
                {{ $totals['all'] ?? $organizations->total() }}
            </h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="summary-card">
            <small class="text-muted">Active Organizations</small>
            <h4 class="fw-bold text-success">
                {{ $totals['active'] ?? $organizations->where('active',1)->count() }}
            </h4>
        </div>
    </div>

    <div class="col-md-4">
        <div class="summary-card">
            <small class="text-muted">Inactive Organizations</small>
            <h4 class="fw-bold text-danger">
                {{ $totals['inactive'] ?? $organizations->where('active',0)->count() }}
            </h4>
        </div>
    </div>

</div>


{{-- ================= TABLE ================= --}}
<div class="apple-card">

<table class="table apple-table align-middle">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Created By</th>
            <th>Status</th>
            <th width="160">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($organizations as $org)
        <tr>
            <td class="fw-semibold d-flex align-items-center gap-2">

    @php
        $words = explode(' ', $org->name);
        $initials = strtoupper(
            substr($words[0],0,1) .
            (isset($words[1]) ? substr($words[1],0,1) : '')
        );
    @endphp

    <div style="
        width:38px;
        height:38px;
        border-radius:50%;
        background:#111827;
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:13px;
        font-weight:700;
        letter-spacing:.04em;
    ">
        {{ $initials }}
    </div>

    <span>{{ $org->name }}</span>
</td>

            {{-- <td class="fw-semibold">{{ $org->name }}</td> --}}
            <td class="text-muted">{{ $org->email }}</td>
            <td class="text-muted">{{ $org->phone }}</td>
            <td>{{ $org->country }}</td>

            <td>
                {{ $org->creator->name ?? 'System' }}
            </td>

            <td>
                <span class="status-pill {{ $org->active ? 'status-active':'status-inactive' }}">
                    {{ $org->active ? 'Active':'Inactive' }}
                </span>
            </td>

            <td>
                <form method="POST"
                      action="{{ route('admin.organizations.toggle',$org) }}">
                    @csrf
                    @method('PATCH')

                    <button class="btn btn-sm btn-dark rounded-pill px-3">
                        Toggle
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-3">
    {{ $organizations->links() }}
</div>

</div>

@endsection
