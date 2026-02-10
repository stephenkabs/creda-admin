<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
<title>Creda Loans Management System • Web</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Icons -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
      <link rel="shortcut icon" href="/assets/images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
@include('ui.style')
</head>
<body>
<!-- Page Loader -->
<div id="pageLoader" aria-hidden="true">
  <div class="loader-wrap">
    <!-- Optional logo (remove if you don't want it) -->
    {{-- <img src="/assets/logo.webp" alt="Rent App" class="loader-logo"> --}}
    <div class="loader-ring"></div>
    {{-- <div class="loader-label">Loading</div> --}}
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(() => {
    const loader = document.getElementById('pageLoader');
    if (!loader) return;
    loader.classList.add('hidden');
    setTimeout(() => loader.style.display = 'none', 550);
  }, 300);
});

</script>


<header>
  <div class="brand">
    <img src="/logo.webp" alt="OnPay Logo" class="brand-logo">
  </div>

  <div class="nav-links d-none d-md-flex">
    <a href="#hero">Home</a>
    <a href="#about">About</a>
    <a href="#services">Services</a>
        <a href="#api">Developers</a>
        <a href="#footer">Documentation</a>
    <a href="#footer">Contact Us</a>

    <a href="https://app.neurasofts.com/" class="nav-btn login-btn">Login</a>
    {{-- <a href="/register" class="nav-btn signup-btn">Register</a> --}}
  </div>
</header>





<section class="hero" id="hero">
  <div class="hero-left-overlay"></div>

  <div class="hero-content">
<h1>Creda Loans Management System</h1>

<p>
  A modern, secure loan management platform designed for
  <strong>microfinance institutions</strong>,
  <strong>SACCOs</strong>, and
  <strong>digital lenders</strong>.
  Manage loans, repayments, clients, and risk with confidence — all in one system.
</p>


    <div class="hero-buttons">
      <a href="https://app.neurasofts.com/" class="btn-primary"><i class="fas fa-sign-in-alt me-1"></i> Sign In</a>
      <a href="/register" class="btn-outline"><i class="fas fa-user-plus me-1"></i> Get Started</a>
    </div>
  </div>
</section>
<section class="about-section" id="about">
  <div class="about-container">

    <!-- Left: Text -->
    <div class="about-text">
      <span class="about-badge">About the Platform</span>

    <h2>About Creda Loans</h2>


<p>
  <strong>Creda Loans Management System</strong> is a powerful, end-to-end
  platform built to manage the full loan lifecycle — from application
  and approval to repayment tracking and reporting.
</p>

<p>
  The system centralizes borrower data, loan schedules, payments,
  penalties, and risk indicators — helping lenders reduce defaults,
  improve recovery, and operate efficiently at scale.
</p>


<ul class="about-list">
  <li><i class="fas fa-check-circle"></i> Loan application & approval workflows</li>
  <li><i class="fas fa-check-circle"></i> Automated repayment schedules</li>
  <li><i class="fas fa-check-circle"></i> Client & guarantor management</li>
  <li><i class="fas fa-check-circle"></i> Default tracking & penalties</li>
  <li><i class="fas fa-check-circle"></i> Reports, audit logs & compliance</li>
</ul>

    </div>

    <!-- Right: Visual Card -->
    <div class="about-visual">
      <div class="about-card">

        <div class="about-card-badge">
          <i class="fas fa-shield-alt"></i> Trusted Screening
        </div>

        <img src="/2.webp" alt="Multiverse Screening Dashboard">

      </div>
    </div>

  </div>
</section>

<section class="ms-features" id="services">
  <div class="ms-features-inner">

    <!-- Section header -->
    <div class="ms-features-header">
      <span class="section-badge">Core Capabilities</span>
      <h2>What Creda Loans Delivers</h2>

      <p>
        A complete loan management infrastructure designed to help lenders
        manage borrowers, control risk, track repayments, and grow sustainably.
      </p>
    </div>

    <!-- Feature grid -->
    <div class="ms-feature-grid">

      <!-- FEATURE 1 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-file-signature"></i>
        </div>
        <h5>Loan Application Management</h5>
        <p>
          Digitally capture, review, and approve loan applications with
          configurable workflows and approval levels.
        </p>
        <span class="ms-feature-chip">LOAN INTAKE</span>
      </div>

      <!-- FEATURE 2 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-calendar-check"></i>
        </div>
        <h5>Automated Repayment Schedules</h5>
        <p>
          Generate monthly, weekly, or custom repayment schedules with
          interest, penalties, and balance tracking.
        </p>
        <span class="ms-feature-chip">AUTOMATED</span>
      </div>

      <!-- FEATURE 3 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h5>Default & Risk Monitoring</h5>
        <p>
          Track overdue loans, missed payments, penalties, and borrower
          risk indicators in real time.
        </p>
        <span class="ms-feature-chip danger">RISK CONTROL</span>
      </div>

      <!-- FEATURE 4 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-users"></i>
        </div>
        <h5>Client & Guarantor Management</h5>
        <p>
          Maintain complete borrower profiles including guarantors,
          documents, loan history, and payment behavior.
        </p>
        <span class="ms-feature-chip">BORROWER DATA</span>
      </div>

      <!-- FEATURE 5 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <h5>Audit Logs & Accountability</h5>
        <p>
          Every approval, edit, and payment is logged with user,
          timestamp, and institution for transparency.
        </p>
        <span class="ms-feature-chip">FULL TRACE</span>
      </div>

      <!-- FEATURE 6 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-plug"></i>
        </div>
        <h5>API & System Integration</h5>
        <p>
          Integrate Creda Loans with payment gateways, mobile apps,
          accounting systems, and external platforms via secure APIs.
        </p>
        <span class="ms-feature-chip">API READY</span>
      </div>

      <!-- FEATURE 7 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-database"></i>
        </div>
        <h5>Central Loan Registry</h5>
        <p>
          Prevent multiple borrowing and over-exposure by maintaining
          a centralized view of borrower loans across institutions.
        </p>
        <span class="ms-feature-chip">CENTRAL RECORD</span>
      </div>

      <!-- FEATURE 8 -->
      <div class="ms-feature-card">
        <div class="ms-feature-icon">
          <i class="fas fa-lock"></i>
        </div>
        <h5>Security & Data Protection</h5>
        <p>
          Built with encryption, role-based access control, and
          strict audit policies to protect sensitive financial data.
        </p>
        <span class="ms-feature-chip">DATA SECURE</span>
      </div>

    </div>

  </div>
</section>



<section class="api-section" id="api">
  <div class="api-container">

    <!-- Left: Text -->
    <div class="api-text">
      <span class="api-badge">For Developers</span>
      <h2>Powerful APIs & Easy Integrations</h2>

      <p>
        <strong>Creda Loans Management System</strong> provides secure,
        well-structured APIs that allow lenders and fintech platforms
        to integrate loan management directly into mobile apps,
        accounting systems, payment gateways, and internal platforms.
      </p>

      <ul class="api-list">
        <li><i class="fas fa-check-circle"></i> Loan creation & approval endpoints</li>
        <li><i class="fas fa-check-circle"></i> Repayment posting & balance queries</li>
        <li><i class="fas fa-check-circle"></i> Token-based authentication (API tokens)</li>
        <li><i class="fas fa-check-circle"></i> Institution-level access control</li>
        <li><i class="fas fa-check-circle"></i> Full audit & activity logging</li>
      </ul>

      <div class="api-actions">
        <a href="/documentation" class="btn-dark">
          <i class="fas fa-book me-1"></i> View API Docs
        </a>

        <a href="/api-tokens" class="btn-outline-dark">
          <i class="fas fa-key me-1"></i> Generate API Token
        </a>
      </div>
    </div>

    <!-- Right: Code Preview -->
    <div class="api-code">
<pre><code><span class="comment">// Example: Create a new loan</span>
POST /api/v1/loans

{
  "client_id": 102,
  "amount": 5000,
  "interest_rate": 15,
  "duration_months": 6
}

<span class="comment">// Response</span>
{
  "status": "approved",
  "loan_id": "CRD-2026-0041",
  "monthly_payment": 975,
  "outstanding_balance": 5000
}
</code></pre>
    </div>

  </div>
</section>



<footer class="ms-footer" id="footer">
  <div class="ms-footer-container">

    <!-- Brand -->
    <div class="ms-footer-brand">
      <img src="/logo_white.webp" alt="Creda Loans Logo">
      <p>
        <strong>Creda Loans Management System</strong> is a modern,
        secure loan management platform built to help lenders
        manage loans, repayments, risk, and growth with confidence.
      </p>
    </div>

    <!-- Links -->
    <div class="ms-footer-links">
      <h4>Platform</h4>
      <a href="/">Home</a>
      <a href="#about">About Us</a>
      <a href="#services">Features</a>
      <a href="#api">API & Integrations</a>
    </div>

    <div class="ms-footer-links">
      <h4>Resources</h4>
      <a href="/documentation">Documentation</a>
      <a href="/login">Login</a>
      <a href="/register">Get Started</a>
      <a href="/support">Contact Support</a>
    </div>

    <!-- Contact -->
    <div class="ms-footer-links">
      <h4>Contact</h4>
      <div class="ms-footer-contact">
        <i class="fas fa-envelope"></i>
        <span>support@neurasofts.com</span>
      </div>
      <div class="ms-footer-contact">
        <i class="fas fa-phone"></i>
        <span>+260 773 360 664</span>
      </div>
      <div class="ms-footer-contact">
        <i class="fas fa-map-marker-alt"></i>
        <span>Lusaka - Zambia • Africa</span>
      </div>
    </div>

  </div>

  <!-- Bottom -->
  <div class="ms-footer-bottom">
    © {{ now()->year }} Creda Loans Management System • Built by Neurasoft Technologies Inc.
  </div>
</footer>



<script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
