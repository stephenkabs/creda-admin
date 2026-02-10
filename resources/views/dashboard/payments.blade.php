@extends('layouts.app')

@section('content')

@php
$primary   = $preferences->primary_color ?? '#2563eb';
$secondary = $preferences->secondary_color ?? '#111827';
$accent    = $preferences->accent_color ?? '#22c55e';
@endphp

<style>

/* APPLE HEADER */
.apple-header{
    background: linear-gradient(135deg, {{ $primary }}, {{ $secondary }});
    color:white;
    padding:28px 32px;
    border-radius:26px;
    margin-bottom:28px;
    box-shadow:0 20px 60px rgba(0,0,0,.18);
}

.apple-header h2{
    font-weight:800;
    letter-spacing:.2px;
    color:white;
}

/* APPLE CARDS */
.apple-card{
    display:block;
    text-decoration:none;
    background: rgba(255,255,255,.95);
    border-radius:26px;
    padding:30px 26px;
    border:1px solid rgba(229,231,235,.9);
    box-shadow:0 12px 35px rgba(0,0,0,.08);
    transition: all .28s ease;
    height:100%;
    position:relative;
    overflow:hidden;
}

.apple-card:hover{
    transform: translateY(-6px);
    box-shadow:0 28px 65px rgba(0,0,0,.15);
}

/* ICON */
.apple-icon{
    width:64px;
    height:64px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    margin-bottom:18px;
    background:linear-gradient(135deg, {{ $primary }}, {{ $accent }});
    color:white;
    box-shadow:0 12px 30px rgba(0,0,0,.18);
}

/* TITLE */
.apple-title{
    font-size:18px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:6px;
}

/* DESC */
.apple-desc{
    font-size:13px;
    color:#6b7280;
    line-height:1.6;
}

/* shine */
.apple-card::after{
    content:"";
    position:absolute;
    top:0;
    left:-60%;
    width:50%;
    height:100%;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.35),transparent);
    transform:skewX(-25deg);
    transition:.7s;
}
.apple-card:hover::after{
    left:130%;
}

</style>

{{-- HEADER --}}
<div class="apple-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="mb-1">Payments Center</h2>
        <small class="text-white-50">Select loan category to manage repayments</small>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-3">
        <a href="/salary-payments" class="apple-card">
            <div class="apple-icon"><i class="fas fa-money-check-alt"></i></div>
            <div class="apple-title">Salary Loan Payments</div>
            <div class="apple-desc">
                Record and monitor repayments made through payroll deductions.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('payments.index') }}" class="apple-card">
            <div class="apple-icon"><i class="fas fa-briefcase"></i></div>
            <div class="apple-title">Business Loan Payments</div>
            <div class="apple-desc">
                Track repayments from SMEs and enterprise loan facilities.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="/coming-soon" class="apple-card">
            <div class="apple-icon"><i class="fas fa-id-badge"></i></div>
            <div class="apple-title">Civil Servant Payments</div>
            <div class="apple-desc">
                Manage government employee loan repayment activities.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="/market-loans-payments" class="apple-card">
            <div class="apple-icon"><i class="fas fa-store"></i></div>
            <div class="apple-title">Marketeer Loan Payments</div>
            <div class="apple-desc">
                Track daily and weekly repayments from market trader loans.
            </div>
        </a>
    </div>

</div>

@endsection
