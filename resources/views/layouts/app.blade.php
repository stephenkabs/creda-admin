<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? 'Creda App' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" />
    <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" />

    @stack('styles')


</head>

<body data-sidebar="dark">



    <div id="layout-wrapper">

        {{-- Top Header --}}
        @include('includes.header')

        {{-- Sidebar --}}
        @include('includes.sidebar')



        <!-- MAIN CONTENT -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    {{-- Inject page content --}}
                    @yield('content')

                </div>
            </div>

        </div>

    </div>

    <div class="rightbar-overlay"></div>

    <!-- JS -->
    <script src="/assets/libs/jquery/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/libs/node-waves/waves.min.js"></script>
    <script src="/assets/js/app.js"></script>

    @stack('scripts')
  @include('includes.modals.success')
    @include('includes.modals.error')

<script>
document.addEventListener("DOMContentLoaded", () => {

    const spinner = document.querySelector(".header-spinner");
    const topLoader = document.getElementById("top-loader");
    const favicon = document.querySelector("link[rel='icon']");

    let originalFavicon = favicon?.href;
    let loadingFavicon = "/spinner.ico"; // 👈 create a small spinner favicon

    function startLoader() {
        spinner?.classList.remove("d-none");
        topLoader.style.width = "80%";

        // Change browser tab icon
        if (favicon && loadingFavicon) {
            favicon.href = loadingFavicon;
        }
    }

    function stopLoader() {
        topLoader.style.width = "100%";

        setTimeout(() => {
            spinner?.classList.add("d-none");
            topLoader.style.width = "0%";

            if (favicon && originalFavicon) {
                favicon.href = originalFavicon;
            }
        }, 400);
    }

    /* Page load */
    startLoader();
    window.addEventListener("load", stopLoader);

    /* All links */
    document.querySelectorAll("a:not([target='_blank'])").forEach(link => {
        link.addEventListener("click", e => {
            if (link.href && !link.href.includes("#")) {
                startLoader();
            }
        });
    });

    /* All forms */
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", () => {
            startLoader();
        });
    });

    /* Optional: expose globally for AJAX */
    window.startGlobalLoader = startLoader;
    window.stopGlobalLoader = stopLoader;
});
</script>
<style>
    .apple-delete-modal {
    border-radius: 22px;
    background: rgba(255,255,255,.96);
    backdrop-filter: blur(14px);
    box-shadow: 0 30px 80px rgba(0,0,0,.25);
    border: 1px solid rgba(229,231,235,.9);
}

.apple-delete-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: rgba(239,68,68,.1);
    color: #ef4444;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin: 0 auto;
}

</style>


{{-- ================= APPLE DELETE MODAL ================= --}}
<div class="modal fade" id="appleDeleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content apple-delete-modal p-4">

            {{-- ICON --}}
            <div class="text-center mb-3">
                <div class="apple-delete-icon">
                    <i class="fas fa-trash"></i>
                </div>
            </div>

            {{-- TITLE --}}
            <h5 class="fw-bold text-center mb-1">
                Delete Item?
            </h5>

            {{-- MESSAGE --}}
            <p class="text-muted text-center small mb-4">
                This action cannot be undone. Are you sure you want to proceed?
            </p>

            {{-- FORM --}}
            <form method="POST" id="appleDeleteForm">
                @csrf
                @method('DELETE')

                <div class="d-flex justify-content-center gap-3">
                    <button type="button"
                            class="btn btn-white rounded-pill px-4"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-danger rounded-pill px-4">
                        Yes, Delete
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
document.getElementById('appleDeleteModal')
    .addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;
        const url = button.getAttribute('data-delete-url');

        const form = document.getElementById('appleDeleteForm');
        form.action = url;
    });
</script>

</body>


</html>
