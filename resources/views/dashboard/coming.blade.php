@extends('layouts.app')

@section('content')
<style>/* ================= COMING SOON CARD ================= */
.coming-card{
    background: rgba(255,255,255,.96);
    border-radius: 28px;
    padding: 42px 34px;
    border: 1px solid rgba(229,231,235,.9);
    box-shadow:
        0 30px 80px rgba(0,0,0,.08),
        inset 0 1px 0 rgba(255,255,255,.7);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(14px);
}

/* soft glow gradient */
.coming-card::before{
    content:"";
    position:absolute;
    inset:-40%;
    background: radial-gradient(
        circle at top,
        rgba(59,130,246,.12),
        transparent 60%
    );
    z-index:0;
}

/* keep content above */
.coming-card > *{
    position:relative;
    z-index:1;
}

/* title */
.coming-title{
    font-weight:800;
    font-size:28px;
    letter-spacing:.2px;
    color:#111827;
}

/* description */
.coming-desc{
    font-size:14px;
    color:#6b7280;
    line-height:1.7;
    margin-top:10px;
}

/* icon circle */
.coming-icon{
    width:78px;
    height:78px;
    border-radius:50%;
    background:linear-gradient(135deg,#2563eb,#4f46e5);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:28px;
    color:white;
    margin:0 auto 18px auto;
    box-shadow:0 18px 45px rgba(0,0,0,.18);
}
</style>

<div class="d-flex justify-content-center align-items-center" style="min-height:70vh;">
    <div class="text-center apple-card" style="max-width:520px;">

        <div class="mb-3">
            <div class="apple-delete-icon"
                 style="background:rgba(59,130,246,.12); color:#2563eb;">
                <i class="fas fa-rocket"></i>
            </div>
        </div>

        <h3 class="fw-bold mb-2">Civil Servant Loans Module</h3>

        <p class="text-muted mb-3">
            This module is currently under development and will be available soon.
            It will enable full lifecycle management of civil servant loans,
            payroll-based deductions, and compliance reporting.
        </p>

        <a href="{{ url()->previous() }}"
           class="btn btn-dark rounded-pill px-4">
            Back
        </a>

    </div>
</div>

@endsection
