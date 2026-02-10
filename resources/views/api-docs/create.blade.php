@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col">
        <h4 class="fw-bold mb-1">Create API Documentation</h4>
        <p class="text-muted mb-0">
            Add a new API endpoint for developers & integrations
        </p>
    </div>
</div>

<form method="POST" action="{{ route('api-docs.store') }}">
@csrf

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        {{-- MODULE --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Module</label>
            <input type="text"
                   name="module"
                   class="form-control"
                   placeholder="e.g. Loans, Clients, Payments"
                   required>
        </div>

        {{-- TITLE --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   placeholder="e.g. Fetch Loans (Receivables)"
                   required>
        </div>

        <div class="row">
            {{-- METHOD --}}
            <div class="col-md-3 mb-3">
                <label class="form-label fw-semibold">HTTP Method</label>
                <select name="method" class="form-select" required>
                    <option value="">Select</option>
                    <option>GET</option>
                    <option>POST</option>
                    <option>PUT</option>
                    <option>PATCH</option>
                    <option>DELETE</option>
                </select>
            </div>

            {{-- ENDPOINT --}}
            <div class="col-md-9 mb-3">
                <label class="form-label fw-semibold">Endpoint</label>
                <input type="text"
                       name="endpoint"
                       class="form-control fw-monospace"
                       placeholder="/api/v1/loans"
                       required>
            </div>
        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description"
                      rows="3"
                      class="form-control"
                      placeholder="Explain what this endpoint does"></textarea>
        </div>

        {{-- REQUEST EXAMPLE --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Request Example (JSON)</label>
            <textarea name="request_example"
                      rows="5"
                      class="form-control fw-monospace"
                      placeholder='{
  "date_from": "2026-01-01",
  "date_to": "2026-02-01"
}'></textarea>
        </div>

        {{-- RESPONSE EXAMPLE --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Response Example (JSON)</label>
            <textarea name="response_example"
                      rows="6"
                      class="form-control fw-monospace"
                      placeholder='{
  "id": 16,
  "reference": "loan-1770424922",
  "total": 7364.58
}'></textarea>
        </div>

        {{-- NOTES --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">Notes</label>
            <textarea name="notes"
                      rows="2"
                      class="form-control"
                      placeholder="Important integration notes (order, dependencies, etc)"></textarea>
        </div>

        {{-- ACTIONS --}}
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('api-docs.index') }}"
               class="btn btn-light rounded-pill px-4">
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-dark rounded-pill px-4">
                Save API Doc
            </button>
        </div>

    </div>
</div>

</form>

@endsection
