<!DOCTYPE html>
<html>
<head>
  <title>Account Pending Approval</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e5e5e5] min-h-screen flex flex-col items-center justify-center p-6">

<div class="max-w-xl w-full bg-white rounded-2xl shadow-xl p-10 text-center">

  <!-- Status Icon -->
  <div class="mb-6">
      <div class="mx-auto w-16 h-16 rounded-full bg-red-100 flex items-center justify-center shadow">
          <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M5.07 19H18.93c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
          </svg>
      </div>
  </div>

  <h1 class="text-2xl font-semibold mb-2">
    Account pending activation
  </h1>

  <p class="text-gray-500 mb-8">
    Thank you for completing the setup.
    Your organization account is currently awaiting administrator approval.
    Once activated, you will be able to access the full system.
  </p>

<form method="POST" action="{{ route('dashboard.logout') }}">
    @csrf

    <button
        type="submit"
        class="inline-block px-8 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-semibold transition">
        Login
    </button>
</form>


</div>

<!-- Powered by -->
<div class="mt-6 text-center">
    <img src="/logo.webp" class="mx-auto mb-2 opacity-80" width="90">
    <p class="text-xs text-gray-400">
        Powered by <span class="font-semibold text-gray-500">Neurasoft</span>
    </p>
</div>

</body>
</html>
