<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Verify email</title>

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
         alt="Verify email">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="absolute bottom-0 left-0 p-10 text-white">
      <h2 class="text-3xl font-bold leading-tight">
        Verify your email
      </h2>
      <p class="mt-3 text-sm text-white/90 max-w-sm">
        We need to confirm your email address before you continue.
      </p>
      <div class="mt-4 text-xs uppercase tracking-widest text-white/70">
        Account verification
      </div>
    </div>
  </div>

  <!-- RIGHT CONTENT -->
  <div class="w-full md:w-1/2 p-8 md:p-10">

    <!-- Logo -->
    <div class="mb-6 text-center">
      <img src="/logo.webp" alt="Logo" class="mx-auto" width="190">
      <h1 class="mt-4 text-xl font-semibold text-gray-800">
        Check your inbox
      </h1>
      <p class="mt-1 text-sm text-gray-500">
        We’ve sent you a verification link
      </p>
    </div>

    <!-- Status -->
    @if (session('status') == 'verification-link-sent')
      <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
        A new verification link has been sent to your email address.
      </div>
    @endif

    <div class="mb-6 text-sm text-gray-600">
      Thanks for signing up!
      Before getting started, please verify your email address by clicking
      the link we just sent to you.
      <br><br>
      If you didn’t receive the email, you can request another one below.
    </div>

    <!-- Actions -->
    <div class="flex flex-col gap-4">

      <!-- Resend -->
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit"
                class="w-full rounded-xl bg-[#353535] px-4 py-3 text-[15px] font-semibold text-white
                hover:bg-[#191919] transition">
          Resend verification email →
        </button>
      </form>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
                text-gray-700 hover:bg-gray-50 transition">
          Log out
        </button>
      </form>

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
