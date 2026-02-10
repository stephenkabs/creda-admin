@php
    $prefs = auth()->user()?->organization?->preference;
@endphp
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Creda App</title>

  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/app.min.css" rel="stylesheet" />
  <link href="/assets/css/icons.min.css" rel="stylesheet" />
  <link rel="shortcut icon" href="/assets/images/favicon.png">
<style>
/* ===============================
   🌈 ORG AWARE GRADIENT HEADER
================================ */

.gradient-animate {
  background: linear-gradient(
    120deg,
    var(--org-secondary),
    var(--org-primary),
    var(--org-accent),
    var(--org-primary-dark),
    var(--org-secondary)
  );

  background-size: 320% 320%;
  animation: gradientFlow 14s ease infinite;
}

@keyframes gradientFlow {
  0%   { background-position: 0% 50%; }
  50%  { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
</style>

  <style>
/* ===============================
   BASE
================================ */
body {
  background:#e8e8e8;
  font-family:-apple-system,BlinkMacSystemFont,"SF Pro Text","Segoe UI",Roboto,Helvetica,Arial,sans-serif;
}

.apple-card {
  background:#fff;
  border-radius:16px;
  padding:28px;
  box-shadow:0 4px 20px rgba(0,0,0,.05);
  margin-bottom:24px;
}

/* ===============================
   🍏 SKELETON LOADER
================================ */
@keyframes shimmer {
  0% { background-position:-200px 0; }
  100% { background-position:200px 0; }
}

.skeleton-line,
.skeleton-icon,
.skeleton-circle,
.skeleton-row {
  background: linear-gradient(90deg,#f0f1f5 25%,#e4e6eb 37%,#f0f1f5 63%);
  background-size:400% 100%;
  animation: shimmer 1.4s infinite;
  border-radius:8px;
}

.skeleton-card {
  background:#fff;
  border-radius:14px;
  padding:20px;
  display:flex;
  gap:16px;
  align-items:center;
}

.skeleton-circle { width:64px;height:64px;border-radius:50%; }
.skeleton-line { height:12px; }
.w-50{width:50%} .w-30{width:30%}
.w-60{width:60%} .w-80{width:80%}

.skeleton-tile {
  background:#fff;
  border-radius:14px;
  padding:18px;
  display:flex;
  gap:14px;
}

.skeleton-icon { width:54px;height:54px;border-radius:12px }


/* new */

/* ===============================
   🍏 MATCHING ADMIN SKELETON
================================ */

.skeleton-admin-card {
  background: #fff;
  border-radius: 16px;
  padding: 24px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}

.skeleton-admin-left {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-grow: 1;
}

.skeleton-badge {
  width: 140px;
  height: 34px;
  border-radius: 999px;
  background: linear-gradient(
    90deg,
    #f0f1f5 25%,
    #e4e6eb 37%,
    #f0f1f5 63%
  );
  background-size: 400% 100%;
  animation: shimmer 1.4s infinite;
}

/* ===============================
   🍎 SETTINGS GRID SKELETON
================================ */

.skeleton-settings-card {
  background: #fff;
  border-radius: 22px;
  padding: 28px;
  box-shadow: 0 18px 45px rgba(0,0,0,.04);
}

.skeleton-settings-icon {
  width: 56px;
  height: 56px;
  border-radius: 16px;
  margin-bottom: 16px;
  background: linear-gradient(
    90deg,
    #f0f1f5 25%,
    #e4e6eb 37%,
    #f0f1f5 63%
  );
  background-size: 400% 100%;
  animation: shimmer 1.4s infinite;
}

/* reuse existing skeleton-line widths */
.w-70 { width: 70%; }
.w-90 { width: 90%; }


/* ===============================
   🖼️ ADMIN HEADER — IMAGE BASED
================================ */

.org-hero {
    position: relative;
    overflow: hidden;
    color: #ffffff;

    /* 👇 CHANGE THIS IMAGE */
    background-image: url("back.webp");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* Dark overlay for readability */
.org-hero::before {
    content: "";
    position: absolute;
    inset: 0;

    background: linear-gradient(
        to right,
        rgba(0,0,0,.65),
        rgba(0,0,0,.35)
    );

    z-index: 0;
}

/* Keep content above overlay */
.org-hero > * {
    position: relative;
    z-index: 1;
}

/* ===============================
   🍎 SETTINGS GRID
================================ */
.settings-grid {
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
  gap:24px;
}

.settings-card {
  background:rgba(255,255,255,.96);
  border-radius:22px;
  border:1px solid #e5e7eb;
  padding:28px;
  box-shadow:0 18px 45px rgba(0,0,0,.08);
  transition:.25s;
  text-decoration:none;
  color:inherit;
}

.settings-card:hover {
  transform:translateY(-6px);
  box-shadow:0 28px 70px rgba(0,0,0,.14);
}

.settings-icon {
  width:56px;
  height:56px;
  border-radius:16px;
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:22px;
  color:#fff;
  margin-bottom:16px;
}

.bg-red{background:linear-gradient(135deg,#9b0000,#7d0000)}
.bg-blue{background:linear-gradient(135deg,#2563eb,#1d4ed8)}
.bg-green{background:linear-gradient(135deg,#16a34a,#22c55e)}
.bg-purple{background:linear-gradient(135deg,#7c3aed,#6d28d9)}
.bg-indigo{background:linear-gradient(135deg,#6366f1,#4f46e5)}
.bg-gray{background:linear-gradient(135deg,#374151,#1f2937)}
.bg-orange{background:linear-gradient(135deg,#722f06,#e48643)}
.bg-lightblue{background:linear-gradient(135deg,#043d45,#0896a3)}
.bg-steph{background:linear-gradient(135deg,#3e4504,#b4da0c)}
.bg-nice{background:linear-gradient(135deg,#2e0445,#620cda)}
.bg-good{background:linear-gradient(135deg,#04452e,#0cdac2)}

.settings-title{font-weight:700;font-size:16px}
.settings-desc{font-size:13px;color:#6b7280}
  </style>
</head>

<body data-sidebar="dark">

@include('includes.header')
@include('includes.sidebar')

<div class="main-content">
<div class="page-content">
<div class="container-fluid">

<!-- 🍏 SKELETON (MATCHING ADMIN + GRID) -->
<div id="dashboard-skeleton">

  <!-- ADMIN / WELCOME CARD SKELETON -->
  <div class="skeleton-admin-card mb-4">
    <div class="skeleton-admin-left">
      <div class="skeleton-circle"></div>
      <div class="skeleton-lines">
        <div class="skeleton-line w-60"></div>
        <div class="skeleton-line w-80"></div>
      </div>
    </div>

    <div class="skeleton-badge"></div>
  </div>

  <!-- SETTINGS GRID SKELETON -->
  <div class="settings-grid">

    @for($i = 0; $i < 5; $i++)
      <div class="skeleton-settings-card">
        <div class="skeleton-settings-icon"></div>

        <div class="skeleton-lines">
          <div class="skeleton-line w-70"></div>
          <div class="skeleton-line w-90"></div>
        </div>
      </div>
    @endfor

  </div>
</div>

@php
$primary   = $preferences->primary_color ?? '#2563eb';
$secondary = $preferences->secondary_color ?? '#111827';
$accent    = $preferences->accent_color ?? '#22c55e';
@endphp

<!-- 🍏 CONTENT -->
<div id="dashboard-content" style="display:none;">


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
      <i class="fas fa-user-shield fa-lg"></i>
    </div>

    <div class="flex-grow-1">
      <h4 class="mb-1 fw-bold text-white">
        Loan Consultant Dashboard
      </h4>
      <small class="text-white-50">
           {{ $organization->name }}
      </small>
    </div>

    <span class="badge bg-light text-dark rounded-pill px-3 py-2">
      {{ $user->name }}s
    </span>

  </div>
</div>

<style>
.settings-icon{
    width:56px;
    height:56px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
}
</style>




@php
$iconColors = [
    $preferences->primary_color,
    $preferences->secondary_color,
    $preferences->accent_color ?? $preferences->primary_color,
];
$i = 0;
@endphp

<!-- SETTINGS GRID -->
<div class="settings-grid mt-4 mb-5">

<a href="{{ route('clients.index') }}" class="settings-card">
    <div class="settings-icon" style="background: {{ $iconColors[$i++ % 3] }}">
         <i class="fas fa-users"></i>
    </div>
    <div class="settings-title">My Clients</div>
    <div class="settings-desc">View and manage assigned clients</div>
</a>

<a href="{{ route('client-assets.index') }}" class="settings-card">
    <div class="settings-icon" style="background: {{ $iconColors[$i++ % 3] }}">
        <i class="fas fa-hand-holding-usd"></i>
    </div>
    <div class="settings-title">Loans</div>
    <div class="settings-desc">
        Create and manage client loans
    </div>
</a>

<a href="{{ route('dues.index') }}" class="settings-card">
    <div class="settings-icon" style="background: {{ $iconColors[$i++ % 3] }}">
        <i class="fas fa-calendar-check"></i>
    </div>
    <div class="settings-title">Due Follow-ups</div>
    <div class="settings-desc">
        Track upcoming repayments
    </div>
</a>



<a href="{{ route('dashboard.payments') }}" class="settings-card">
    <div class="settings-icon" style="background: {{ $iconColors[$i++ % 3] }}">
               <i class="fas fa-money-bill-wave"></i>
    </div>
    <div class="settings-title">Loans Payments</div>
    <div class="settings-desc">
       Record and review loan payments
    </div>
</a>

<a href="gg" class="settings-card">
    <div class="settings-icon" style="background: {{ $iconColors[$i++ % 3] }}">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="settings-title">Loan Reports</div>
    <div class="settings-desc">
       Analyze loan performance
    </div>
</a>



</div>


</div>
</div>
</div>

<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/app.js"></script>

<script>
document.addEventListener('DOMContentLoaded',()=>{
  setTimeout(()=>{
    document.getElementById('dashboard-skeleton').style.display='none';
    document.getElementById('dashboard-content').style.display='block';
  },400);
});
</script>

</body>
</html>
