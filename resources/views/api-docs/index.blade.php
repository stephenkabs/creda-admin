@extends('layouts.app')
<style>/* ===============================
   🍎 APPLE API DOCS
================================ */

/* Card container */
.api-doc-card {
    background: rgba(255,255,255,0.96);
    border-radius: 22px;
    border: 1px solid rgba(229,231,235,.9);
    box-shadow:
        0 12px 30px rgba(0,0,0,.06),
        0 40px 80px rgba(0,0,0,.08);
    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.api-doc-card:hover {
    transform: translateY(-3px);
    box-shadow:
        0 20px 40px rgba(0,0,0,.08),
        0 50px 100px rgba(0,0,0,.12);
}

/* Module title */
.api-module-title {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: .02em;
    color: #111827;
    margin-bottom: 18px;
}

/* Table base */
.api-doc-table {
    border-collapse: separate;
    border-spacing: 0 12px;
}

/* Header */
.api-doc-table thead th {
    font-size: 11px;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #6b7280;
    border: none;
    padding: 10px 14px;
}

/* Row card */
.api-doc-table tbody tr {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,.04);
    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.api-doc-table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(0,0,0,.08);
}

/* Cells */
.api-doc-table tbody td {
    border: none;
    padding: 14px 16px;
    vertical-align: middle;
}

/* First + last cell rounding */
.api-doc-table tbody tr td:first-child {
    border-radius: 16px 0 0 16px;
}

.api-doc-table tbody tr td:last-child {
    border-radius: 0 16px 16px 0;
}

/* HTTP method pill */
.api-method {
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 999px;
    background: #111827;
    color: #fff;
    letter-spacing: .06em;
}

/* Endpoint */
.api-endpoint {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 13px;
    color: #111827;
}

/* Description */
.api-desc {
    font-size: 13px;
    color: #6b7280;
}

/* View button */
.api-view-btn {
    border-radius: 999px;
    font-size: 12px;
    padding: 6px 14px;
    transition: all .2s ease;
}

.api-view-btn:hover {
    background: #111827;
    color: #fff;
}

/* Mobile tweaks */
@media (max-width: 768px) {
    .api-doc-table thead {
        display: none;
    }

    .api-doc-table tbody tr {
        display: block;
        margin-bottom: 14px;
    }

    .api-doc-table tbody td {
        display: flex;
        justify-content: space-between;
        padding: 10px 14px;
    }

    .api-doc-table tbody td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #6b7280;
    }
}
</style>
@section('content')


<div class="row mb-3">
    <div class="col">
        <h4 class="fw-bold mb-1">API Documentation</h4>
        <p class="text-muted mb-0">
            Internal & partner API endpoints for system integrations
        </p>
    </div>
</div>

@foreach($docs as $module => $items)
<div class="row mb-4">
    <div class="col">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                {{-- MODULE HEADER --}}
                <h5 class="fw-bold mb-3">
                    {{ $module }}
                </h5>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Method</th>
                                <th>Endpoint</th>
                                <th>Description</th>
                                <th width="120"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $doc)
                            <tr>
                                <td>
                                    <span class="badge bg-dark">
                                        {{ $doc->method }}
                                    </span>
                                </td>
                                <td class="fw-monospace">
                                    {{ $doc->endpoint }}
                                </td>
                                <td class="text-muted">
                                    {{ Str::limit($doc->description, 80) }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('api-docs.show', $doc) }}"
                                       class="btn btn-sm btn-outline-dark rounded-pill">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
