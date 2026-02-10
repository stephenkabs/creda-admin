<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Reset password</title>

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
         alt="Reset password">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="absolute bottom-0 left-0 p-10 text-white">
      <h2 class="text-3xl font-bold leading-tight">
        Create a new password
      </h2>
      <p class="mt-3 text-sm text-white/90 max-w-sm">
        Choose a strong password to secure your account.
      </p>
      <div class="mt-4 text-xs uppercase tracking-widest text-white/70">
        Account recovery
      </div>
    </div>
  </div>

  <!-- RIGHT FORM -->
  <div class="w-full md:w-1/2 p-8 md:p-10">

    <!-- Logo -->
    <div class="mb-6 text-center">
      <img src="/logo.webp" alt="Logo" class="mx-auto" width="190">
      <h1 class="mt-4 text-xl font-semibold text-gray-800">
        Reset password
      </h1>
      <p class="mt-1 text-sm text-gray-500">
        Enter and confirm your new password
      </p>
    </div>

    <!-- Errors -->
    @if ($errors->any())
      <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
      @csrf

      <!-- Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Email -->
      <input type="email"
             name="email"
             value="{{ old('email', $request->email) }}"
             placeholder="Email address"
             autocomplete="username"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required autofocus>

      <!-- New Password -->
      <input type="password"
             name="password"
             placeholder="New password"
             autocomplete="new-password"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <!-- Confirm Password -->
      <input type="password"
             name="password_confirmation"
             placeholder="Confirm new password"
             autocomplete="new-password"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <button type="submit"
              class="w-full rounded-xl bg-[#353535] px-4 py-3 text-[15px] font-semibold text-white
              hover:bg-[#191919] transition">
        Reset password →
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-6 text-sm text-center">
      <a href="{{ route('login') }}"
         class="font-medium text-[#353535] hover:text-[#191919] transition">
        Back to sign in
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
