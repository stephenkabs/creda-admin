<!DOCTYPE html>
<html>
<head>
  <title>Setup Complete</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e5e5e5] min-h-screen flex items-center justify-center p-6">

<div class="max-w-xl w-full bg-white rounded-2xl shadow-xl p-10 text-center">

  <!-- Logo -->
  <div class="mb-6">
      <img src="/logo.webp" class="mx-auto mb-5" width="170">
  </div>

  <!-- Success Icon -->
  {{-- <div class="mb-6">
    <div class="mx-auto w-16 h-16 rounded-full bg-green-100 flex items-center justify-center shadow">
      <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M5 13l4 4L19 7" />
      </svg>
    </div>
  </div> --}}

  <h1 class="text-2xl font-semibold mb-2">
    Setup complete 🎉
  </h1>

  <p class="text-gray-500 mb-8">
    Your organization is now ready. You can start managing loans and users.
  </p>

  <a href="{{ url('/dashboard') }}"
     class="inline-block px-8 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-semibold transition">
    Go to dashboard →
  </a>

  <p class="mt-6 text-xs text-gray-400">
    You can change these settings anytime from the system settings.
  </p>

</div>

</body>
</html>
