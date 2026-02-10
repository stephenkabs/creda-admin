@extends('layouts.app')

@section('content')

<style>
/* ===============================
   🍎 APPLE ADMIN HEADER
================================ */
.admin-header{
    background: linear-gradient(135deg,#111827,#000000);
    color:white;
    padding:32px;
    border-radius:28px;
    margin-bottom:28px;
    box-shadow:0 25px 60px rgba(0,0,0,.25);
}

.admin-header h2{
    font-weight:800;
    letter-spacing:.3px;
}

/* ===============================
   🍎 APPLE ADMIN CARDS
================================ */
.admin-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:24px;
}

.admin-card{
    display:block;
    text-decoration:none;
    background:#ffffff;
    border-radius:24px;
    padding:30px 26px;
    border:1px solid #e5e7eb;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    transition:.28s;
    position:relative;
    overflow:hidden;
}

.admin-card:hover{
    transform:translateY(-6px);
    box-shadow:0 28px 70px rgba(0,0,0,.15);
}

.admin-icon{
    width:64px;
    height:64px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:22px;
    margin-bottom:18px;
    background:linear-gradient(135deg,#9b0000,#7d0000);
    box-shadow:0 10px 30px rgba(0,0,0,.18);
}

.admin-title{
    font-size:18px;
    font-weight:800;
    color:#0f172a;
}

.admin-desc{
    font-size:13px;
    color:#6b7280;
}

/* shine */
.admin-card::after{
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
.admin-card:hover::after{ left:130%; }

</style>

{{-- HEADER --}}
<div class="admin-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="mb-1" style="color: white">System Administrator</h2>
        <small class="text-white-50">
            Global system control, platform monitoring & configuration
        </small>
    </div>

    <span class="badge bg-light text-dark rounded-pill px-3 py-2">
        {{ auth()->user()->name }}
    </span>
</div>

{{-- ADMIN CONTROL GRID --}}
<div class="admin-grid">
<a href="gh" class="admin-card">
    <div class="admin-icon"><i class="fas fa-building"></i></div>
    <div class="admin-title">Organizations</div>
    <div class="admin-desc">
        Manage all organizations registered on the platform
    </div>
</a>


<a href="fghgfh" class="admin-card">
    <div class="admin-icon"><i class="fas fa-users"></i></div>
    <div class="admin-title">All Users</div>
    <div class="admin-desc">View and manage platform users</div>
</a>

<a href="{{ route('admin.privacy.index') }}" class="admin-card">
    <div class="admin-icon">
        <i class="fas fa-user-lock"></i>
    </div>
    <div class="admin-title">Privacy Policy</div>
    <div class="admin-desc">
        Manage system privacy rules and data protection policy
    </div>
</a>





<a href="{{ route('admin.backup.index') }}" class="admin-card">
    <div class="admin-icon"><i class="fas fa-database"></i></div>
    <div class="admin-title">  Database Backup</div>
    <div class="admin-desc">Manually export and store the system database securely in DigitalOcean Spaces</div>
</a>

<a href="{{ route('admin.login-attempts') }}" class="admin-card">
    <div class="admin-icon">
               <i class="fas fa-shield-alt"></i>
    </div>
    <div class="admin-title">  Login Security</div>
    <div class="admin-desc">Monitor failed login attempts, suspicious activity, and potential threats</div>
</a>




</div>

@endsection
