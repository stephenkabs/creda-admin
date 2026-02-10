<!DOCTYPE html>
<html>
<head>
  <title>Preferences</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e5e5e5] min-h-screen flex items-center justify-center p-6">

<div class="max-w-3xl w-full bg-white rounded-2xl shadow-xl p-10">

  <h1 class="text-2xl font-semibold mb-2 text-center">
    System preferences
  </h1>

  <p class="text-center text-gray-500 mb-8">
    Configure default lending rules and organization branding
  </p>

  <form method="POST"
        action="{{ route('setup.preferences.store') }}"
        enctype="multipart/form-data"
        class="space-y-6">
    @csrf

    <!-- Interest -->
    <div>
      <label class="block text-sm font-medium mb-1">Interest calculation</label>
      <select name="interest_type" class="w-full rounded-xl border px-4 py-3">
        <option value="reducing">Reducing balance</option>
        <option value="flat">Flat rate</option>
      </select>
    </div>

    <!-- Grace -->
    <div>
      <label class="block text-sm font-medium mb-1">Grace period (days)</label>
      <input type="number" name="grace_period_days" value="0"
             class="w-full rounded-xl border px-4 py-3">
    </div>

    <!-- Penalty -->
    <div>
      <label class="block text-sm font-medium mb-1">Penalty rate (%)</label>
      <input type="number" step="0.01" name="penalty_rate" value="0"
             class="w-full rounded-xl border px-4 py-3">
    </div>

    <!-- COLOR PICKERS -->
    <div class="grid grid-cols-3 gap-3">
        <div>
            <label class="text-xs text-gray-600">Primary color</label>
            <input type="color" name="primary_color"
                   required
                   class="w-full h-12 rounded-xl border">
        </div>

        <div>
            <label class="text-xs text-gray-600">Secondary color</label>
            <input type="color" name="secondary_color"
                   required
                   class="w-full h-12 rounded-xl border">
        </div>

        <div>
            <label class="text-xs text-gray-600">Accent color</label>
            <input type="color" name="accent_color"
                   class="w-full h-12 rounded-xl border">
        </div>
    </div>

    <!-- Hidden active -->
    <input type="hidden" name="active" value="false">

    <!-- LOGO -->
    <div>
        <label class="block text-xs font-semibold text-gray-600 mb-2">
            Institution logo
        </label>

        <label class="flex flex-col items-center justify-center w-full h-36
                      border-2 border-dashed border-gray-300 rounded-2xl
                      cursor-pointer bg-gray-50 hover:bg-gray-100 transition">

            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                <svg class="w-8 h-8 mb-2 text-gray-400"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M7 16V8m0 0l4-4m-4 4l-4-4M7 8h10a4 4 0 014 4v6a4 4 0 01-4 4H7"/>
                </svg>

                <p class="text-sm text-gray-600">
                    <span class="font-semibold">Click to upload</span> or drag logo
                </p>

                <p class="text-xs text-gray-400 mt-1">
                    PNG, JPG or WEBP (max 2MB)
                </p>
            </div>

            <input id="logoInput"
                   type="file"
                   name="logo"
                   accept="image/png,image/jpeg,image/webp"
                   class="hidden">
        </label>

        <img id="logoPreview"
             class="mt-3 mx-auto hidden h-16 rounded-lg shadow">
    </div>

    <!-- CHECKBOXES -->
    <div class="border-t pt-6">
      <label class="flex items-center gap-3">
        <input type="checkbox" name="email_otp_enabled" class="rounded">
        <span class="text-sm">Enable email OTP (recommended)</span>
      </label>

      <label class="flex items-center gap-3 mt-3">
        <input type="checkbox" name="temp_password_enabled" class="rounded">
        <span class="text-sm">Use temporary passwords for staff</span>
      </label>
    </div>

    <div class="pt-6 text-center">
      <button class="px-8 py-3 bg-gray-900 text-white rounded-xl font-semibold">
        Finish setup →
      </button>
    </div>

  </form>

</div>

<script>
document.getElementById('logoInput').addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;

    const reader = new FileReader();
    reader.onload = function(evt){
        const img = document.getElementById('logoPreview');
        img.src = evt.target.result;
        img.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
});
</script>

</body>
</html>
