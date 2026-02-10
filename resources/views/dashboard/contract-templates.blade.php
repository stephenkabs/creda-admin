@extends('layouts.app')

@section('content')

@php
$primary   = $preferences->primary_color ?? '#2563eb';
$secondary = $preferences->secondary_color ?? '#111827';
$accent    = $preferences->accent_color ?? '#22c55e';
@endphp

<style>
.apple-header{
    background: linear-gradient(135deg, {{ $primary }}, {{ $secondary }});
    color:white;
    padding:28px 32px;
    border-radius:26px;
    margin-bottom:28px;
    box-shadow:0 20px 60px rgba(0,0,0,.18);
}

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

.apple-title{
    font-size:18px;
    font-weight:800;
    color:#0f172a;
    margin-bottom:6px;
}

.apple-desc{
    font-size:13px;
    color:#6b7280;
    line-height:1.6;
}
</style>

{{-- HEADER --}}
<div class="apple-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="mb-1" style="color: white">Contract Templates Center</h2>
        <small class="text-white-50">Manage contract templates for each loan category</small>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-3">
        <a href="{{ route('salary-loan-template.edit',['type'=>'salary']) }}" class="apple-card">
            <div class="apple-icon"><i class="fas fa-money-check-alt"></i></div>
            <div class="apple-title">Salary Loan Template</div>
            <div class="apple-desc">
                Configure contract template used for payroll deduction loans.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('contract-templates.index',['type'=>'business']) }}" class="apple-card">
            <div class="apple-icon"><i class="fas fa-briefcase"></i></div>
            <div class="apple-title">Business Loan Template</div>
            <div class="apple-desc">
                Templates used for SME and enterprise financing contracts.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('contract-templates.index',['type'=>'market']) }}" class="apple-card">
            <div class="apple-icon"><i class="fas fa-store"></i></div>
            <div class="apple-title">Marketeer Loan Template</div>
            <div class="apple-desc">
                Configure templates for market trader micro-loans.
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('contract-templates.index',['type'=>'civil']) }}" class="apple-card">
            <div class="apple-icon"><i class="fas fa-id-badge"></i></div>
            <div class="apple-title">Civil Servant Template</div>
            <div class="apple-desc">
                Contracts used for government employee financing.
            </div>
        </a>
    </div>

</div>

@endsection
