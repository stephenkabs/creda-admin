<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Institution Onboarding • Creda Loans Management System</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-gray-100 flex items-start justify-center p-6">

  <div class="w-full max-w-5xl">

    <!-- TOP IMAGE CARD -->
    <div class="relative rounded-2xl overflow-hidden shadow-lg mb-8">
      <img src="/6.webp"
           alt="Creda Loans Management System"
           class="w-full h-[280px] object-cover">

      <div class="absolute inset-0 bg-black/55"></div>

      <div class="absolute inset-0 flex items-center justify-center text-center px-6">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">
            Institution Onboarding
          </h1>
          <p class="text-gray-200 max-w-xl mx-auto text-sm leading-relaxed">
            Access to <strong>Creda Loans Management System</strong> is granted
            only to verified lending institutions after compliance and
            due-diligence review.
          </p>
        </div>
      </div>
    </div>

    <!-- INFO CARDS -->
    <div class="grid md:grid-cols-2 gap-6">

      <!-- CARD 1: ONBOARDING & KYC -->
      <div class="bg-white rounded-2xl shadow-md ring-1 ring-black/5 p-6 md:p-8">

        <div class="flex items-center gap-3 mb-4">
          <div class="h-10 w-10 rounded-xl bg-red-100 text-red-700 flex items-center justify-center">
            <i class="fas fa-user-shield"></i>
          </div>
          <h2 class="text-xl font-bold text-gray-900">
            Verification & Compliance
          </h2>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed mb-4">
          <strong>Creda Loans</strong> follows a
          <strong>manual onboarding process</strong>
          to ensure responsible lending, regulatory compliance,
          and secure handling of borrower financial data.
        </p>

        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800 mb-4">
          Registration is <strong>not automatic</strong>.
          Platform access is granted only after successful review and approval.
        </div>

        <h4 class="text-sm font-semibold text-gray-900 mb-2">
          Required Information
        </h4>

        <ul class="space-y-2 text-sm text-gray-700">
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-red-600 mt-1"></i>
            Authorized representative KYC details
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-red-600 mt-1"></i>
            Business Registration Number
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-red-600 mt-1"></i>
            TPIN (Tax Payer Identification Number)
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-red-600 mt-1"></i>
            Official institution contact details
          </li>
        </ul>
      </div>

      <!-- CARD 2: APPROVAL & API ACCESS -->
      <div class="bg-white rounded-2xl shadow-md ring-1 ring-black/5 p-6 md:p-8">

        <div class="flex items-center gap-3 mb-4">
          <div class="h-10 w-10 rounded-xl bg-gray-900 text-white flex items-center justify-center">
            <i class="fas fa-plug"></i>
          </div>
          <h2 class="text-xl font-bold text-gray-900">
            Approval & Platform Access
          </h2>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed mb-4">
          Once your institution is approved, your account will be activated
          with full access to the <strong>Creda Loans platform</strong>
          and optional system integrations.
        </p>

        <h4 class="text-sm font-semibold text-gray-900 mb-2">
          After Approval
        </h4>

        <ul class="space-y-2 text-sm text-gray-700 mb-4">
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-gray-900 mt-1"></i>
            Secure institution login credentials issued
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-gray-900 mt-1"></i>
            Institution-level roles & access controls enabled
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-gray-900 mt-1"></i>
            API token generation for system integration
          </li>
          <li class="flex gap-2">
            <i class="fas fa-check-circle text-gray-900 mt-1"></i>
            Full audit logging & financial traceability
          </li>
        </ul>

        <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 text-sm text-gray-700">
          <strong>API Integrations:</strong><br>
          Approved institutions can integrate Creda Loans into
          loan platforms, mobile apps, payment gateways,
          accounting systems, or internal financial workflows
          using secure, token-based APIs.
        </div>
      </div>

    </div>

    <!-- ACTIONS -->
    <div class="mt-8 flex flex-wrap gap-3 justify-center">
      <a href="/"
         class="rounded-xl bg-red-700 px-6 py-3 text-white text-sm font-semibold hover:bg-red-800 transition">
        Contact Onboarding Team
      </a>

      <a href="/login"
         class="rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100 transition">
        Back to Login
      </a>
    </div>

    <!-- FOOTNOTE -->
    <p class="mt-6 text-center text-xs text-gray-500">
      All submitted information is securely stored and reviewed in accordance
      with applicable financial regulations, data protection laws,
      and responsible lending standards.
    </p>

  </div>

</body>
</html>
