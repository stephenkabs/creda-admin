<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Sign in</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="/assets/images/favicon.png">

  <style>
    /* Apple-like shimmer */
    .shimmer{
      position: relative;
      overflow: hidden;
    }
    .shimmer::after{
      content:"";
      position:absolute;
      inset:0;
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

<body class="min-h-screen bg-[#ececec] flex items-center justify-center p-4">

<!-- Skeleton Loader -->
<div id="skeleton"
     class="fixed inset-0 z-50 flex items-center justify-center bg-[#ececec]">

  <div class="w-full max-w-md bg-white/95 rounded-2xl shadow-2xl ring-1 ring-black/10
              p-10 space-y-5 animate-pulse">

    <div class="h-10 w-40 mx-auto bg-gray-300 rounded shimmer"></div>
    <div class="h-11 rounded-xl bg-gray-300 shimmer"></div>
    <div class="h-11 rounded-xl bg-gray-300 shimmer"></div>
    <div class="h-11 rounded-xl bg-gray-400 shimmer"></div>
  </div>
</div>

<!-- Card -->
<div class="w-full max-w-md bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl
            ring-1 ring-black/10 p-8 md:p-10">

  <!-- Logo -->
  <div class="mb-6 text-center">
    <img src="/logo.webp" alt="Neurasoft" class="mx-auto h-10">
    <h1 class="mt-4 text-xl font-semibold text-gray-800">
      Admin Sign In
    </h1>
    <p class="mt-1 text-sm text-gray-500">
      Secure system administration access
    </p>
  </div>

  <!-- Alerts -->
  @if (session('status'))
    <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
      {{ $errors->first() }}
    </div>
  @endif

  <!-- Form -->
  <form method="POST" action="{{ route('login') }}" class="space-y-4">
    @csrf

    <input type="email" name="email" placeholder="Admin email"
           value="{{ old('email') }}"
           class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
           focus:outline-none focus:ring-2 focus:ring-black/80"
           required autofocus>

    <input type="password" name="password" placeholder="Password"
           class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
           focus:outline-none focus:ring-2 focus:ring-black/80"
           required>

    <button type="submit"
            class="w-full rounded-xl bg-black px-4 py-3 text-[15px] font-semibold text-white
            hover:bg-gray-900 transition">
      Sign in →
    </button>
  </form>

  <!-- Footer -->
  <div class="mt-6 flex items-center justify-between text-sm">
    @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}"
         class="font-medium text-gray-700 hover:text-black transition">
        Forgot password?
      </a>
    @endif
  </div>

  <p class="mt-6 text-center text-[11px] text-gray-500">
    Restricted access · Authorized administrators only
  </p>

  <p class="mt-3 text-center text-[11px] text-gray-400">
    © {{ date('Y') }} Neurasoft Technologies
  </p>

</div>

<script>
window.addEventListener('load', () => {
  const s = document.getElementById('skeleton');
  setTimeout(() => {
    s.style.opacity = '0';
    s.style.transition = 'opacity .35s ease';
    setTimeout(() => s.remove(), 350);
  }, 600);
});
</script>

</body>
</html>
