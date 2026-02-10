<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Privacy Policy • Workora</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* ===============================
       🌿 WORKORA PRIVACY POLICY
    ================================ */
    body{
        background:#f4f7f6;
        font-family:-apple-system,BlinkMacSystemFont,"SF Pro Text",
        "Segoe UI",Roboto,Helvetica,Arial,sans-serif;
        color:#111827;
    }

    .policy-wrapper{
        max-width:900px;
        margin:auto;
    }

    /* HEADER */
    .policy-header{
        background:linear-gradient(
            135deg,
            #6e6e6e 0%,
            #464646 45%,
            #303030 100%
        );
        color:#fff;
        border-radius:24px;
        padding:38px 32px;
        text-align:center;
        box-shadow:0 20px 45px rgba(22,163,74,.35);
    }

    .policy-header h1{
        font-weight:900;
        letter-spacing:-.03em;
        margin-bottom:6px;
        color:#fff;
    }

    .policy-header p{
        opacity:.85;
        margin-bottom:0;
        font-size:14px;
    }

    /* CONTENT CARD */
    .policy-card{
        background:#fff;
        border-radius:26px;
        padding:40px;
        margin-top:-24px;
        box-shadow:0 25px 60px rgba(0,0,0,.08);
        border:1px solid #e5e7eb;
    }

    .policy-card h4{
        margin-top:32px;
        font-weight:800;
        color:#14532d;
        letter-spacing:-.01em;
    }

    .policy-card p,
    .policy-card li{
        font-size:14.5px;
        line-height:1.85;
        color:#374151;
    }

    .policy-card ul{
        padding-left:18px;
        margin-top:12px;
    }

    .policy-card li{
        margin-bottom:6px;
    }

    /* FOOTER */
    .policy-footer{
        text-align:center;
        font-size:12px;
        color:#6b7280;
        margin:28px 0 10px;
    }

    /* BACK LINK */
    .back-link{
        display:inline-flex;
        align-items:center;
        gap:6px;
        font-weight:600;
        color:#166534;
        text-decoration:none;
        margin-bottom:16px;
    }

    .back-link:hover{
        text-decoration:underline;
    }
    </style>
</head>

<body>

<div class="container py-5">
    <div class="policy-wrapper">

        <!-- HEADER -->
        <div class="policy-header">
            <h1>Privacy Policy</h1>
            <p>
                Last updated:
                {{ optional($policy)->updated_at?->format('F d, Y') ?? now()->format('F d, Y') }}
            </p>
        </div>

        <!-- CONTENT -->
        <div class="policy-card">

            <a href="/" class="back-link">
                ← Back to Workora
            </a>

            @if(isset($policy) && $policy->content)
                {!! $policy->content !!}
            @else
                <!-- DEFAULT POLICY CONTENT -->
                <p>
                    Workora (“we”, “our”, “us”) is committed to protecting your privacy.
                    This Privacy Policy explains how we collect, use, disclose, and safeguard
                    your information when you use the Workora platform.
                </p>

                <h4>1. Information We Collect</h4>
                <ul>
                    <li>Personal information (name, email, phone number)</li>
                    <li>Employee and institutional data provided by organizations</li>
                    <li>Attendance, payroll, and performance records</li>
                    <li>Technical data such as IP address, browser type, and device information</li>
                </ul>

                <h4>2. How We Use Your Information</h4>
                <ul>
                    <li>To provide and maintain the Workora platform</li>
                    <li>To manage employees, attendance, payroll, and compliance</li>
                    <li>To generate reports and analytics</li>
                    <li>To ensure system security and audit logging</li>
                </ul>

                <h4>3. Data Protection & Security</h4>
                <p>
                    We implement industry-standard security measures to protect your data.
                    Access to sensitive information is restricted and logged.
                </p>

                <h4>4. Compliance</h4>
                <p>
                    Workora is designed to support compliance with local and statutory
                    requirements, including payroll obligations such as NAPSA, NHIMA,
                    and ZRA PAYE (where applicable).
                </p>

                <h4>5. Data Sharing</h4>
                <p>
                    We do not sell or rent your data. Information is only shared where
                    legally required or necessary to provide system functionality.
                </p>

                <h4>6. Your Rights</h4>
                <ul>
                    <li>Access and review your personal data</li>
                    <li>Request corrections or updates</li>
                    <li>Request deletion where legally permissible</li>
                </ul>

                <h4>7. Changes to This Policy</h4>
                <p>
                    We may update this Privacy Policy from time to time.
                    Changes will be reflected on this page with an updated date.
                </p>

                <h4>8. Contact Us</h4>
                <p>
                    If you have any questions about this Privacy Policy, please contact us at:
                    <br><strong>support@workora.app</strong>
                </p>
            @endif

        </div>

        <!-- FOOTER -->
        <div class="policy-footer">
            © {{ date('Y') }} Workora • Built by Neurasoft Technologies Inc.
        </div>

    </div>
</div>

<script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
