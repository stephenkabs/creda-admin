@extends('layouts.app')

@section('content')

@push('styles')
<style>
/* ===============================
   🌿 PRIVACY POLICY – GREEN THEME
================================ */
.policy-wrapper {
    max-width: 900px;
    margin: auto;
}

.policy-header {
    background: linear-gradient(
        135deg,
        #7c7c7c 0%,
        #636363 45%,
        #3c3c3c 100%
    );
    color: #fff;
    border-radius: 20px;
    padding: 32px;
    box-shadow: 0 18px 40px rgba(93, 93, 93, 0.35);
}

.policy-header h2 {
    font-weight: 800;
    margin-bottom: 6px;
    color: white;
}

.policy-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 36px;
    box-shadow: 0 20px 50px rgba(0,0,0,.08);
    border: 1px solid #e5e7eb;
}

.policy-card h5 {
    margin-top: 28px;
    font-weight: 700;
    color: #404040; /* dark green */
}

.policy-card p,
.policy-card li {
    color: #374151;
    font-size: 14px;
    line-height: 1.8;
}

.policy-card ul {
    padding-left: 18px;
}

.policy-footer {
    text-align: center;
    font-size: 12px;
    color: #6b7280;
    margin-top: 24px;
}
</style>
@endpush

<div class="container py-5">
    <div class="policy-wrapper">

        {{-- HEADER --}}
        <div class="policy-header text-center mb-4">
            <h2>Privacy Policy</h2>
            <p class="opacity-75 mb-0">
                Last updated
                {{ optional($policy)->updated_at?->format('F d, Y') ?? '—' }}
            </p>
        </div>

        {{-- CONTENT --}}
        <div class="policy-card">
            {!! $policy?->content ?? '<p>No privacy policy has been published yet.</p>' !!}
        </div>

        {{-- FOOTER --}}
        <div class="policy-footer">
            © {{ date('Y') }} {{ config('app.name') }}.
            All rights reserved.
        </div>

    </div>
</div>

@endsection
