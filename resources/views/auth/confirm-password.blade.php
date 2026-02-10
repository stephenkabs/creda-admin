<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Confirm password</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="/assets/images/favicon.png">

  <style>
    .shimmer{ position: relative; overflow: hidden; }
    .shimmer::after{
      content:"";
      position:absolute; inset:0;
      background: linear-gradient(
        110deg,
        rgba(255,255,255,0) 30%,
        rgba(255,255,255,.55) 45%,
        rgba(255,255,255,0) 60%
      );
      animation: shimmer 1.4s infinite;
    }
    @keyframes shimmer{
      from { transform: translateX(-100%); }
      to   { transform: translateX(100%); }
    }
  </style>
</head>

<body class="min-h-screen bg-[#e5e5e5] flex items-center justify-center p-4 pb-16">

<!-- Skeleton Loader -->
<div id="skeleton"
     class="fixed inset-0 z-50 flex items-center justify-center bg-[#e5e5e5]">

  <div class="w-full max-w-[900px] bg-white/95 rounded-2xl shadow-2xl ring-1 ring-black/10
              flex flex-col md:flex-row overflow-hidden animate-pulse">

    <div class="hidden md:block md:w-1/2 bg-gray-300 shimmer"></div>

    <div class="w-full md:w-1/2 p-10 space-y-5">
      <div class="h-10 w-40 mx-auto bg-gray-300 rounded shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-300 shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-400 shimmer"></div>
    </div>
  </div>
</div>

<!-- Card -->
<div class="w-full max-w-[900px] bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl
            ring-1 ring-black/10 flex flex-col md:flex-row overflow-hidden">

  <!-- LEFT HERO -->
  <div class="hidden md:block md:w-1/2 relative">
    <img src="/6.webp"
         class="w-full h-full object-cover object-top"
         alt="Confirm password">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="absolute bottom-0 left-0 p-10 text-white">
      <h2 class="text-3xl font-bold leading-tight">
        Confirm your identity
      </h2>
      <p class="mt-3 text-sm text-white/90 max-w-sm">
        Please re-enter your password to continue.
      </p>
      <div class="mt-4 text-xs uppercase tracking-widest text-white/70">
        Secure area access
      </div>
    </div>
  </div>

  <!-- RIGHT FORM -->
  <div class="w-full md:w-1/2 p-8 md:p-10">

    <!-- Logo -->
    <div class="mb-6 text-center">
      <img src="/logo.webp" alt="Logo" class="mx-auto" width="190">
      <h1 class="mt-4 text-xl font-semibold text-gray-800">
        Confirm password
      </h1>
      <p class="mt-1 text-sm text-gray-500">
        This is a secure area. Please confirm your password to proceed.
      </p>
    </div>

    <!-- Errors -->
    @if ($errors->any())
      <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
        {{ $errors->first('password') }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
      @csrf

      <input type="password"
             name="password"
             placeholder="Password"
             autocomplete="current-password"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required autofocus>

      <button type="submit"
              class="w-full rounded-xl bg-[#353535] px-4 py-3 text-[15px] font-semibold text-white
              hover:bg-[#191919] transition">
        Confirm →
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-6 text-sm text-center">
      <a href="{{ url()->previous() }}"
         class="font-medium text-[#353535] hover:text-[#191919] transition">
        Cancel and go back
      </a>
    </div>

    <p class="mt-6 text-center text-[11px] text-gray-400">
      Powered by <span class="font-semibold">Neurasoft Technologies</span>
    </p>

  </div>
</div>

<script>
window.addEventListener('load', () => {
  const s = document.getElementById('skeleton');
  setTimeout(() => {
    s.style.opacity = '0';
    s.style.transition = 'opacity .35s ease';
    setTimeout(() => s.remove(), 350);
  }, 700);
});
</script>

</body>
</html>
