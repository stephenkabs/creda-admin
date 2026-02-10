<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Institution Setup</title>

<script src="https://cdn.tailwindcss.com"></script>
<link rel="shortcut icon" href="/assets/images/favicon.png">

<style>
.apple-card{
    backdrop-filter: blur(16px);
    box-shadow: 0 30px 80px rgba(0,0,0,.18);
}
</style>
</head>

<body class="min-h-screen bg-[#e5e5e5] flex items-center justify-center p-4">

<div class="w-full max-w-[640px] bg-white/95 apple-card rounded-2xl ring-1 ring-black/10 p-7">

<!-- Header -->
<div class="text-center mb-6">
    <img src="/logo.webp" class="mx-auto mb-3" width="150">
    <h1 class="text-xl font-semibold text-gray-800">
        Institution setup
    </h1>
    <p class="mt-1 text-sm text-gray-500">
        Configure the organization that will manage loans
    </p>
</div>

@if ($errors->any())
<div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
    {{ $errors->first() }}
</div>
@endif

<form method="POST"
      enctype="multipart/form-data"
      action="{{ route('setup.institution.store') }}"
      class="space-y-4">
@csrf

<!-- Name -->
<input name="name"
       placeholder="Institution name"
       required
       class="w-full rounded-xl border px-4 py-3 text-sm focus:ring-2 focus:ring-gray-800">

<!-- Type + Country -->
<div class="grid grid-cols-2 gap-3">
    <select name="type"
            required
            class="rounded-xl border px-4 py-3 text-sm">
        <option value="">Institution type</option>
        <option>Microfinance</option>
        <option>SACCO</option>
        <option>Payroll Lender</option>
        <option>SME Lender</option>
        <option>Investment Group</option>
    </select>

    <select name="country"
            class="rounded-xl border px-4 py-3 text-sm">
        <option value="Zambia">Zambia</option>
    </select>
</div>

<!-- Email + Phone -->
<div class="grid grid-cols-2 gap-3">
    <input name="email" type="email"
           placeholder="Email"
           class="rounded-xl border px-4 py-3 text-sm">

    <input name="phone"
           placeholder="Phone"
           class="rounded-xl border px-4 py-3 text-sm">
</div>

<!-- Address -->
<input name="address"
       placeholder="Physical address"
       class="w-full rounded-xl border px-4 py-3 text-sm">

<!-- Currency -->
<select name="currency"
        class="w-full rounded-xl border px-4 py-3 text-sm">
    <option value="ZMW">ZMW – Zambian Kwacha</option>
</select>




<!-- Submit -->
<button class="w-full rounded-xl bg-gray-900 px-4 py-3 text-white font-semibold hover:bg-black transition">
    Continue →
</button>

</form>

<p class="mt-5 text-center text-xs text-gray-400">
    This information is used to configure your lending environment
</p>

</div>
</body>
</html>
