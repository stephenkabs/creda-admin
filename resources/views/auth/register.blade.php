<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create your account</title>

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

<body class="min-h-screen bg-[#e5e5e5] flex items-center justify-center p-4 pb-16">

<!-- Skeleton Loader -->
<div id="skeleton"
     class="fixed inset-0 z-50 flex items-center justify-center bg-[#e5e5e5]">

  <div class="w-full max-w-[920px] bg-white/95 rounded-2xl shadow-2xl ring-1 ring-black/10
              flex flex-col md:flex-row overflow-hidden animate-pulse">

    <div class="hidden md:block md:w-1/2 bg-gray-300 shimmer"></div>

    <div class="w-full md:w-1/2 p-10 space-y-5">
      <div class="h-10 w-44 mx-auto bg-gray-300 rounded shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-300 shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-300 shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-300 shimmer"></div>
      <div class="h-12 rounded-xl bg-gray-400 shimmer"></div>
    </div>
  </div>
</div>

<!-- Card -->
<div class="w-full max-w-[920px] bg-white/95 backdrop-blur-lg rounded-2xl shadow-2xl
            ring-1 ring-black/10 flex flex-col md:flex-row overflow-hidden">

  <!-- LEFT HERO -->
  <div class="hidden md:block md:w-1/2 relative">
    <img src="/2.webp"
         class="w-full h-full object-cover object-top"
         alt="Onboarding">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="absolute bottom-0 left-0 p-10 text-white">
      <h2 class="text-3xl font-bold leading-tight">
        Launch your lending system
      </h2>
      <p class="mt-3 text-sm text-white/90 max-w-sm">
        Built for Zambia. Secure. Compliant. Ready to scale.
      </p>
      <div class="mt-4 text-xs uppercase tracking-widest text-white/70">
        Professional SaaS Onboarding
      </div>
    </div>
  </div>

  <!-- RIGHT FORM -->
  <div class="w-full md:w-1/2 p-8 md:p-10">

    <!-- Logo -->
    <div class="mb-6 text-center">
      <img src="/logo.webp" alt="Logo" class="mx-auto" width="190">
      <h1 class="mt-4 text-xl font-semibold text-gray-800">
        Create your account
      </h1>
      <p class="mt-1 text-sm text-gray-500">
        Start setting up your organization
      </p>
    </div>

    <!-- Alerts -->
    @if ($errors->any())
      <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf

      <input type="text" name="name" placeholder="Full name"
             value="{{ old('name') }}"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <input type="email" name="email" placeholder="Work email"
             value="{{ old('email') }}"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <input type="password" name="password" placeholder="Password"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <input type="password" name="password_confirmation"
             placeholder="Confirm password"
             class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm font-medium
             focus:outline-none focus:ring-2 focus:ring-[#353535]/80"
             required>

      <button type="submit"
              class="w-full rounded-xl bg-[#353535] px-4 py-3 text-[15px] font-semibold text-white
              hover:bg-[#191919] transition">
        Continue setup →
      </button>
    </form>

    <!-- Footer -->
    <div class="mt-6 flex items-center justify-between text-sm">
      <a href="{{ route('login') }}"
         class="font-medium text-[#353535] hover:text-[#191919] transition">
        Already have an account?
      </a>
    </div>

    <p class="mt-6 text-center text-[11px] text-gray-500">
      By continuing, you agree to our
      <span class="underline">Terms</span> & <span class="underline">Privacy Policy</span>
    </p>

    <p class="mt-4 text-center text-[11px] text-gray-400">
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
