<!DOCTYPE html>
<html>
<head>
  <title>Select Package</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e5e5e5] min-h-screen flex justify-center items-center p-6">

<div class="max-w-5xl w-full bg-white rounded-2xl shadow-xl p-10">

  <!-- Logo -->
  <div class="text-center mb-6">
      <img src="/logo.webp" class="mx-auto mb-3" width="180">
      <h1 class="text-2xl font-semibold text-center mb-1">
        Choose your package
      </h1>
      <p class="text-center text-gray-500">
        Select a plan that fits your institution
      </p>
  </div>

<form method="POST" action="{{ route('setup.package.store') }}" id="package-form">
@csrf

<div class="grid md:grid-cols-3 gap-6">

@foreach($packages as $package)
<div
    class="package-card border rounded-2xl p-6 cursor-pointer
           transition hover:ring-2 hover:ring-red-600 hover:shadow-lg"
    data-package="{{ $package->id }}">

    <input type="radio"
           name="package_id"
           value="{{ $package->id }}"
           class="hidden">

    <h2 class="text-lg font-semibold">{{ $package->name }}</h2>

    <p class="text-3xl font-bold mt-2 text-red-600">
        K{{ number_format($package->price) }}
        <span class="text-sm font-normal text-gray-500">/month</span>
    </p>

    <ul class="mt-4 text-sm text-gray-600 space-y-1">
        <li>✔ {{ $package->max_users }} users</li>
        <li>✔ {{ $package->max_borrowers }} borrowers</li>
        <li>✔ {{ $package->sms_limit ?? 'Unlimited' }} SMS</li>
        <li>✔ API Access: {{ $package->api_access ? 'Yes' : 'No' }}</li>
    </ul>
</div>
@endforeach

</div>

<div class="mt-10 text-center">
<button
    id="continue-btn"
    disabled
    class="px-10 py-3 rounded-xl font-semibold text-white
           bg-red-600 hover:bg-red-700
           disabled:opacity-40 disabled:cursor-not-allowed transition">
    Continue →
</button>
</div>

</form>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const cards = document.querySelectorAll('.package-card');
    const button = document.getElementById('continue-btn');

    cards.forEach(card => {
        card.addEventListener('click', () => {

            cards.forEach(c => {
                c.classList.remove('ring-2','ring-red-600','bg-red-50');
            });

            card.classList.add('ring-2','ring-red-600','bg-red-50');

            const radio = card.querySelector('input[type="radio"]');
            radio.checked = true;

            button.disabled = false;
        });
    });
});
</script>

</body>
</html>
