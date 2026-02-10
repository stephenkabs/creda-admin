@extends('layouts.app')

@section('content')

@php
    $organization = auth()->user()->organization;

    $preferences = optional($organization)->preference;

    $primary   = $preferences->primary_color   ?? '#2563eb';
    $secondary = $preferences->secondary_color ?? '#111827';
    $accent    = $preferences->accent_color    ?? '#22c55e';
@endphp

<style>
.settings-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:24px;
}

.settings-card{
    background:#fff;
    border-radius:22px;
    padding:28px;
    box-shadow:0 18px 45px rgba(0,0,0,.06);
    transition:.25s;
    text-decoration:none;
    color:inherit;
}

.settings-card:hover{
    transform:translateY(-6px);
    box-shadow:0 28px 70px rgba(0,0,0,.14);
}

.settings-icon{
    width:56px;
    height:56px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:20px;
    margin-bottom:16px;
}

.settings-title{font-weight:700;font-size:16px}
.settings-desc{font-size:13px;color:#6b7280}
</style>

<!-- Header -->
<div class="apple-card text-white"
     style="
        background:
            linear-gradient(
                120deg,
                {{ $primary }}cc,
                {{ $accent }}99,
                {{ $secondary }}cc
            ),
            url('{{ asset('/back.webp') }}');
        background-size: cover;
        background-position: center;
        border-radius: 22px;
        padding: 28px;
     ">


  <div class="d-flex align-items-center gap-3">
      <div class="bg-light text-secondary rounded-circle d-flex align-items-center justify-content-center"
           style="width:64px;height:64px;">
          <i class="fas fa-user-tie"></i>
      </div>

      <div class="flex-grow-1">
          <h4 class="mb-1 fw-bold text-white">
              Consultant Dashboard
          </h4>
          <small class="text-white-50">
              Manage your assigned clients, loans and repayments
          </small>
      </div>

      <span class="badge bg-light text-dark rounded-pill px-3 py-2">
          {{ auth()->user()->name }}
      </span>
  </div>
</div>

@php
$colors = [$primary,$secondary,$accent];
$i = 0;
@endphp

<!-- Consultant Tiles -->
<div class="settings-grid">

<a href="{{ route('clients.index') }}" class="settings-card">
    <div class="settings-icon" style="background:{{ $colors[$i++%3] }}">
        <i class="fas fa-users"></i>
    </div>
    <div class="settings-title">My Clients</div>
    <div class="settings-desc">View and manage assigned clients</div>
</a>

<a href="{{ route('loans.index') }}" class="settings-card">
    <div class="settings-icon" style="background:{{ $colors[$i++%3] }}">
        <i class="fas fa-hand-holding-usd"></i>
    </div>
    <div class="settings-title">Loans</div>
    <div class="settings-desc">Create and manage client loans</div>
</a>

<a href="{{ route('dues.index') }}" class="settings-card">
    <div class="settings-icon" style="background:{{ $colors[$i++%3] }}">
        <i class="fas fa-calendar-check"></i>
    </div>
    <div class="settings-title">Due Follow-ups</div>
    <div class="settings-desc">Track upcoming repayments</div>
</a>

<a href="{{ route('payments.index') }}" class="settings-card">
    <div class="settings-icon" style="background:{{ $colors[$i++%3] }}">
        <i class="fas fa-money-bill-wave"></i>
    </div>
    <div class="settings-title">Payments</div>
    <div class="settings-desc">Record and review loan payments</div>
</a>

<a href="gg" class="settings-card">
    <div class="settings-icon" style="background:{{ $colors[$i++%3] }}">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="settings-title">Loan Reports</div>
    <div class="settings-desc">Analyze loan performance</div>
</a>

</div>

@endsection
