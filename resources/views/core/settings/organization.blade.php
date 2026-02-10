@extends('layouts.app')

@push('styles')
<style>
/* ===============================
   🍎 APPLE-STYLE SETTINGS
================================ */

.apple-card {
    border-radius: 20px;
    border: 1px solid rgba(229,231,235,.9);
    box-shadow: 0 20px 60px rgba(0,0,0,.08);
    background: #fff;
}

.apple-title {
    font-weight: 700;
    letter-spacing: -.3px;
}

.apple-subtitle {
    color: #6b7280;
    font-size: 13px;
}

.apple-input,
.apple-select,
.apple-textarea {
    border-radius: 14px;
    padding: 12px 14px;
    border: 1px solid #e5e7eb;
    font-weight: 500;
}

.apple-input:focus,
.apple-select:focus,
.apple-textarea:focus {
    border-color: #111827;
    box-shadow: 0 0 0 4px rgba(17,24,39,.08);
}

.apple-divider {
    height: 1px;
    background: linear-gradient(
        to right,
        rgba(0,0,0,0),
        rgba(0,0,0,.08),
        rgba(0,0,0,0)
    );
    margin: 28px 0;
}

.apple-save {
    border-radius: 999px;
    padding: 10px 28px;
    font-weight: 600;
}

.apple-switch .form-check-input {
    width: 42px;
    height: 22px;
}

.apple-logo {
    width: 72px;
    height: 72px;
    border-radius: 16px;
    object-fit: cover;
    border: 1px solid #e5e7eb;
}

.apple-card {
    transition: transform .25s ease, box-shadow .25s ease;
}
.apple-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 24px 70px rgba(0,0,0,.12);
}


/* ===============================
   🍎 APPLE RADIO POLICY SELECT
================================ */

.apple-check {
    display: flex;
    gap: 12px;
    padding: 14px 16px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    background: #ffffff;
    cursor: pointer;
    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        transform .15s ease;
    min-width: 260px;
}

/* Hide default radio */
.apple-check input[type="radio"] {
    appearance: none;
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    border: 2px solid #9ca3af;
    margin-top: 4px;
    position: relative;
    cursor: pointer;
    transition: border-color .2s ease, background .2s ease;
}

/* Checked state */
.apple-check input[type="radio"]:checked {
    border-color: #111827;
    background: #111827;
}

/* Inner dot */
.apple-check input[type="radio"]:checked::after {
    content: '';
    position: absolute;
    inset: 3px;
    background: #ffffff;
    border-radius: 50%;
}

/* Hover */
.apple-check:hover {
    border-color: #111827;
    box-shadow: 0 12px 30px rgba(0,0,0,.08);
    transform: translateY(-1px);
}

/* Checked card highlight */
.apple-check:has(input[type="radio"]:checked) {
    border-color: #111827;
    box-shadow: 0 16px 40px rgba(0,0,0,.12);
}

/* Text */
.apple-check .fw-semibold {
    font-size: 14px;
}

.apple-check small {
    display: block;
    font-size: 12px;
    line-height: 1.4;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .apple-check {
        width: 100%;
    }
}

/* ===============================
   🍎 OPTION CARD GROUP
================================ */

.option-card-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 16px;
}

/* Single option card */
.apple-option {
    display: flex;
    gap: 12px;
    padding: 16px 18px;
    border-radius: 18px;
    border: 1px solid #e5e7eb;
    background: #ffffff;
    cursor: pointer;
    /* box-shadow: 0 10px 30px rgba(0,0,0,.06); */
    transition:
        transform .18s ease,
        box-shadow .18s ease,
        border-color .18s ease;
}

/* Hover */
.apple-option:hover {
    transform: translateY(-2px);
    box-shadow: 0 18px 45px rgba(0,0,0,.10);
    border-color: #111827;
}

/* Selected */
.apple-option:has(input:checked) {
    border-color: #111827;
    /* box-shadow: 0 22px 55px rgba(0,0,0,.14); */
}

/* Radio */
.apple-option input[type="radio"] {
    appearance: none;
    width: 18px;
    height: 18px;
    margin-top: 4px;
    border-radius: 50%;
    border: 2px solid #9ca3af;
    position: relative;
    flex-shrink: 0;
}

/* Checked */
.apple-option input[type="radio"]:checked {
    border-color: #111827;
    background: #111827;
}

.apple-option input[type="radio"]:checked::after {
    content: '';
    position: absolute;
    inset: 3px;
    background: #ffffff;
    border-radius: 50%;
}

/* Text */
.apple-option .fw-semibold {
    font-size: 14px;
}

.apple-option small {
    font-size: 12px;
    line-height: 1.4;
}

/* Mobile */
@media (max-width: 768px) {
    .option-card-group {
        grid-template-columns: 1fr;
    }
}

/* ===============================
   🍎 BRAND COLOR SETTINGS (REFINED)
================================ */

.apple-color-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

/* Smaller input */
.apple-color-input {
    position: relative;
    height: 40px; /* ⬅ reduced */
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    background: #ffffff;
    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        transform .15s ease;
}

.apple-color-input:hover {
    border-color: #111827;
    box-shadow: 0 8px 22px rgba(0,0,0,.08);
    transform: translateY(-1px);
}

.apple-color-input input[type="color"] {
    appearance: none;
    -webkit-appearance: none;
    width: 100%;
    height: 100%;
    border: none;
    padding: 0;
    cursor: pointer;
    background: transparent;
}

.apple-color-input input[type="color"]::-webkit-color-swatch-wrapper {
    padding: 0;
}
.apple-color-input input[type="color"]::-webkit-color-swatch {
    border: none;
}
.apple-color-input input[type="color"]::-moz-color-swatch {
    border: none;
}

/* Hex bubble (smaller) */
.apple-color-hex {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 11px;
    font-weight: 600;
    color: #111827;
    background: rgba(255,255,255,.9);
    padding: 3px 8px;
    border-radius: 999px;
    pointer-events: none;
}

/* Label */
.apple-color-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-weight: 600;
    font-size: 13px;
}

/* Dot */
.apple-color-dot {
    width: 14px;
    height: 14px;
    border-radius: 999px;
    border: 1px solid rgba(0,0,0,.12);
}

/* Help text */
.apple-color-help {
    font-size: 11px;
    color: #6b7280;
}

/* Preview */
.apple-color-preview {
    display: flex;
    gap: 12px;
    align-items: center;
}

.apple-preview-btn {
    border-radius: 999px;
    padding: 7px 20px;
    font-weight: 600;
    font-size: 13px;
    border: none;
}

.apple-preview-badge {
    padding: 5px 14px;
    font-size: 11px;
    border-radius: 999px;
    font-weight: 600;
}

</style>
@endpush

@section('content')

{{-- HEADER --}}
<div class="row mb-4">
    <div class="col-12">
        <h3 class="apple-title mb-1">
            Organization Settings
        </h3>
        <p class="apple-subtitle">
            Manage your institution profile, loan rules, and security preferences
        </p>
    </div>
</div>

<div class="row">
    {{-- MAIN --}}
    <div class="col-xl-8 col-lg-9">



        <form method="POST"
              action="{{ route('settings.organization.update') }}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')



            {{-- ================= ORGANIZATION INFO ================= --}}
            <div class="apple-card mb-4">
                <div class="card-body p-4">

                    <h5 class="apple-title mb-1">
                        Organization Information
                    </h5>
                    <p class="apple-subtitle mb-4">
                        Basic identity and contact details
                    </p>

                    {{-- LOGO --}}
                    <div class="mb-4 d-flex align-items-center gap-3">
                        @if($organization->logo)
                            <img src="{{ asset('storage/'.$organization->logo) }}"
                                 class="apple-logo">
                        @else
                            <div class="apple-logo d-flex align-items-center justify-content-center bg-light">
                                <i class="dripicons-photo text-muted"></i>
                            </div>
                        @endif

                        <div class="flex-grow-1">
                            <label class="form-label fw-semibold">
                                Organization Logo
                            </label>
                            <input type="file"
                                   name="logo"
                                   class="form-control apple-input">
                            <small class="text-muted">
                                PNG, JPG or WEBP (max 2MB)
                            </small>
                        </div>
                    </div>

                    {{-- NAME --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Organization Name
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $organization->name) }}"
                               class="form-control apple-input"
                               required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Email Address
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email', $organization->email) }}"
                               class="form-control apple-input">
                    </div>

                    {{-- PHONE --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Phone Number
                        </label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone', $organization->phone) }}"
                               class="form-control apple-input">
                    </div>

                    {{-- ADDRESS --}}
                    <div class="mb-2">
                        <label class="form-label fw-semibold">
                            Address
                        </label>
                        <textarea name="address"
                                  rows="3"
                                  class="form-control apple-textarea">{{ old('address', $organization->address) }}</textarea>
                    </div>

                </div>




            </div>

<div class="apple-card mb-4">
    <div class="card-body p-4">

        {{-- ================= REPAYMENT POLICY ================= --}}
        <div class="mb-4">
            <label class="form-label fw-semibold d-block mb-2">
                Repayment Policy
            </label>

            <div class="option-card-group">

                <label class="apple-option">
                    <input type="radio"
                           name="repayment_policy"
                           value="early_completion"
                           {{ $preferences->repayment_policy === 'early_completion' ? 'checked' : '' }}>

                    <div>
                        <div class="fw-semibold">Early Completion</div>
                        <small class="text-muted">
                            Loan ends immediately once balance reaches zero.
                        </small>
                    </div>
                </label>

                <label class="apple-option">
                    <input type="radio"
                           name="repayment_policy"
                           value="fixed_duration"
                           {{ $preferences->repayment_policy === 'fixed_duration' ? 'checked' : '' }}>

                    <div>
                        <div class="fw-semibold">Fixed Duration</div>
                        <small class="text-muted">
                            Always generate the full repayment period.
                        </small>
                    </div>
                </label>

            </div>
        </div>

        <div class="apple-divider"></div>

        {{-- ================= INTEREST TYPE ================= --}}
        <div>
            <label class="form-label fw-semibold d-block mb-2">
                Interest Type
            </label>

            <div class="option-card-group">

                <label class="apple-option">
                    <input type="radio"
                           name="interest_type"
                           value="flat"
                           {{ $preferences->interest_type === 'flat' ? 'checked' : '' }}>

                    <div>
                        <div class="fw-semibold">Flat Interest</div>
                        <small class="text-muted">
                            Interest calculated once on principal.
                        </small>
                    </div>
                </label>

                <label class="apple-option">
                    <input type="radio"
                           name="interest_type"
                           value="reducing"
                           {{ $preferences->interest_type === 'reducing' ? 'checked' : '' }}>

                    <div>
                        <div class="fw-semibold">Reducing Balance</div>
                        <small class="text-muted">
                            Interest reduces as principal is paid.
                        </small>
                    </div>
                </label>

            </div>
        </div>



    </div>
</div>
{{-- ================= BRAND COLORS ================= --}}
<div class="apple-card mb-4">
    <div class="card-body p-4">

        <h5 class="apple-title mb-1">
            Brand Colors
        </h5>
        <p class="apple-subtitle mb-4">
            Customize your organization’s look and feel across the system
        </p>

        <div class="row g-4">

            {{-- PRIMARY COLOR --}}
            <div class="col-md-4">
                <div class="apple-color-group">

                    <div class="apple-color-label">
                        <span>Primary Color</span>
                        <span class="apple-color-dot"
                              style="background: {{ $preferences->primary_color ?? '#2563eb' }}"></span>
                    </div>

                    <div class="apple-color-input">
                        <input type="color"
                               name="primary_color"
                               value="{{ old('primary_color', $preferences->primary_color ?? '#2563eb') }}">
                        <span class="apple-color-hex">
                            {{ strtoupper($preferences->primary_color ?? '#2563eb') }}
                        </span>
                    </div>

                    <small class="apple-color-help">
                        Buttons & highlights
                    </small>

                </div>
            </div>

            {{-- SECONDARY COLOR --}}
            <div class="col-md-4">
                <div class="apple-color-group">

                    <div class="apple-color-label">
                        <span>Secondary Color</span>
                        <span class="apple-color-dot"
                              style="background: {{ $preferences->secondary_color ?? '#111827' }}"></span>
                    </div>

                    <div class="apple-color-input">
                        <input type="color"
                               name="secondary_color"
                               value="{{ old('secondary_color', $preferences->secondary_color ?? '#111827') }}">
                        <span class="apple-color-hex">
                            {{ strtoupper($preferences->secondary_color ?? '#111827') }}
                        </span>
                    </div>

                    <small class="apple-color-help">
                        Sidebar & headers
                    </small>

                </div>
            </div>

            {{-- ACCENT COLOR --}}
            <div class="col-md-4">
                <div class="apple-color-group">

                    <div class="apple-color-label">
                        <span>Accent Color</span>
                        <span class="apple-color-dot"
                              style="background: {{ $preferences->accent_color ?? '#22c55e' }}"></span>
                    </div>

                    <div class="apple-color-input">
                        <input type="color"
                               name="accent_color"
                               value="{{ old('accent_color', $preferences->accent_color ?? '#22c55e') }}">
                        <span class="apple-color-hex">
                            {{ strtoupper($preferences->accent_color ?? '#22c55e') }}
                        </span>
                    </div>

                    <small class="apple-color-help">
                        Status & emphasis
                    </small>

                </div>
            </div>

        </div>

        <div class="apple-divider"></div>

        {{-- LIVE PREVIEW --}}
        <div class="apple-color-preview">
            <button type="button"
                    class="apple-preview-btn"
                    style="background: {{ $preferences->primary_color ?? '#2563eb' }}; color:#fff;">
                Primary Button
            </button>

            <span class="apple-preview-badge"
                  style="background: {{ $preferences->accent_color ?? '#22c55e' }}; color:#fff;">
                Accent Badge
            </span>
        </div>

    </div>
</div>








            {{-- ================= SECURITY ================= --}}
            <div class="apple-card mb-4">
                <div class="card-body p-4">

                    <h5 class="apple-title mb-1">
                        Security & Authentication
                    </h5>
                    <p class="apple-subtitle mb-4">
                        Control extra verification options
                    </p>

                    <div class="form-check form-switch apple-switch mb-3">
                        <input class="form-check-input"
                               type="checkbox"
                               name="email_otp_enabled"
                               value="1"
                               {{ $preferences->email_otp_enabled ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold">
                            Enable Email OTP
                        </label>
                    </div>

                    <div class="form-check form-switch apple-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               name="temp_password_enabled"
                               value="1"
                               {{ $preferences->temp_password_enabled ? 'checked' : '' }}>
                        <label class="form-check-label fw-semibold">
                            Temporary Passwords for New Users
                        </label>
                    </div>

                </div>
            </div>




            {{-- SAVE --}}
            <div class="text-end">
                <button type="submit"
                        class="btn btn-dark apple-save">
                    Save Changes
                </button>
            </div>

        </form>
    </div>

{{-- INFO PANEL --}}
<div class="col-xl-4 col-lg-3">
    <div class="apple-card">
        <div class="card-body p-4">

            {{-- LOGO --}}
            <div class="mb-4">
                @if($organization->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}"
                         alt="Organization Logo"
                         style="
                            max-width: 160px;
                            max-height: 80px;
                            width: auto;
                            height: auto;
                            object-fit: contain;
                         ">
                @else
                    <div
                        style="
                            width: 160px;
                            height: 80px;
                            background: #f3f4f6;
                            border: 1px dashed #d1d5db;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                        <i class="dripicons-photo text-muted fs-3"></i>
                    </div>
                @endif
            </div>

            <h6 class="fw-bold mb-3">
                Organization Summary
            </h6>

            <p class="text-muted mb-2">
                <strong>Country</strong><br>
                {{ $organization->country ?? '—' }}
            </p>

            <p class="text-muted mb-2">
                <strong>Currency</strong><br>
                {{ $organization->currency ?? '—' }}
            </p>

            <p class="text-muted mb-0">
                <strong>Created</strong><br>
                {{ $organization->created_at->format('d M Y') }}
            </p>

        </div>
    </div>
</div>


</div>

@endsection
