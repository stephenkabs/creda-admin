@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col">
        <a href="{{ route('api-docs.index') }}"
           class="text-muted small">
            ← Back to API Docs
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h4 class="fw-bold mb-1">{{ $apiDoc->title }}</h4>
                <div class="text-muted small">
                    Module: {{ $apiDoc->module }}
                </div>
            </div>

            <span class="badge bg-dark fs-6">
                {{ $apiDoc->method }}
            </span>
        </div>

        {{-- ENDPOINT --}}
        <div class="bg-light rounded p-3 mb-4 fw-monospace">
            {{ $apiDoc->endpoint }}
        </div>

        {{-- DESCRIPTION --}}
        @if($apiDoc->description)
        <div class="mb-4">
            <h6 class="fw-bold">Description</h6>
            <p class="text-muted mb-0">
                {{ $apiDoc->description }}
            </p>
        </div>
        @endif

        {{-- REQUEST --}}
        @if($apiDoc->request_example)
        <div class="mb-4">
            <h6 class="fw-bold">Request Example</h6>
            <pre class="bg-dark text-white p-3 rounded small">
{{ $apiDoc->request_example }}
            </pre>
        </div>
        @endif

        {{-- RESPONSE --}}
        @if($apiDoc->response_example)
        <div class="mb-4">
            <h6 class="fw-bold">Response Example</h6>
            <pre class="bg-dark text-white p-3 rounded small">
{{ $apiDoc->response_example }}
            </pre>
        </div>
        @endif

        {{-- NOTES --}}
        @if($apiDoc->notes)
        <div class="mb-0">
            <h6 class="fw-bold">Notes</h6>
            <div class="alert alert-warning mb-0">
                {{ $apiDoc->notes }}
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
