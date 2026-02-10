@extends('layouts.app')

@push('styles')
<style>
/* ===============================
   🍎 PREMIUM CARD UPGRADE
================================ */

.apple-card {
    position: relative;
    border-radius: 22px;
    background: linear-gradient(
        180deg,
        rgba(255,255,255,0.96),
        rgba(255,255,255,1)
    );
    border: 1px solid rgba(229,231,235,.8);
    box-shadow:
        0 10px 30px rgba(0,0,0,.06),
        0 30px 80px rgba(0,0,0,.08);
    transition:
        transform .25s ease,
        box-shadow .25s ease;
    overflow: hidden;
}

.apple-card::before {
    content: "";
    position: absolute;
    inset: 0 0 auto 0;
    height: 1px;
    background: linear-gradient(
        to right,
        transparent,
        rgba(255,255,255,.9),
        transparent
    );
}

.apple-card:hover {
    transform: translateY(-4px);
    box-shadow:
        0 18px 45px rgba(0,0,0,.10),
        0 40px 120px rgba(0,0,0,.12);
}

.apple-card .card-body {
    padding: 28px;
}

/* ===============================
   🔐 API TOKEN BOX
================================ */

.api-token-box {
    background: radial-gradient(
        circle at top left,
        #0f172a,
        #020617
    );
    color: #22c55e;
    border-radius: 16px;
    padding: 18px 20px;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 13px;
    letter-spacing: .2px;
    line-height: 1.7;
    word-break: break-all;
    box-shadow:
        inset 0 0 0 1px rgba(34,197,94,.25),
        0 10px 25px rgba(0,0,0,.35);
}

/* ===============================
   ⚠️ WARNING BOX
================================ */

.api-warning {
    background: linear-gradient(
        180deg,
        rgba(245,158,11,.12),
        rgba(245,158,11,.08)
    );
    border: 1px solid rgba(245,158,11,.25);
    border-radius: 16px;
    padding: 14px 16px;
    font-size: 12px;
    color: #92400e;
}

/* ===============================
   🎯 BADGES
================================ */

.badge.bg-success {
    background: linear-gradient(135deg, #16a34a, #22c55e) !important;
}

.badge.bg-secondary {
    background: linear-gradient(135deg, #6b7280, #9ca3af) !important;
}

/* ===============================
   🧩 TOKEN ACTIONS
================================ */

.api-token-actions {
    display: flex;
    gap: 10px;
    margin-top: 12px;
}

.api-hint {
    font-size: 12px;
    color: #6b7280;
    margin-top: 8px;
}

/* ===============================
   📱 MOBILE
================================ */

@media (max-width: 768px) {
    .apple-card {
        border-radius: 18px;
    }
}

/* ===============================
   🔘 BADGE BUTTON
================================ */

.badge-action {
    border: none;
    cursor: pointer;
    padding: 6px 14px;
    font-size: 12px;
    font-weight: 700;
    border-radius: 999px;
    transition: transform .15s ease, box-shadow .15s ease;
}

.badge-action:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(0,0,0,.15);
}

.badge-action.bg-success {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    color: #fff;
}

.badge-action.bg-secondary {
    background: linear-gradient(135deg, #6b7280, #9ca3af);
    color: #fff;
}

.badge-action.bg-danger {
    background: linear-gradient(135deg, #dc2626, #ef4444);
    color: #fff;
}

/* ===============================
   🍎 APPLE MODAL
================================ */

.apple-modal-backdrop {
    position: fixed;
    inset: 0;
    background: rgba(15,23,42,.45);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.apple-modal {
    background: linear-gradient(
        180deg,
        rgba(255,255,255,.96),
        rgba(255,255,255,1)
    );
    border-radius: 24px;
    width: 100%;
    max-width: 420px;
    padding: 30px 28px;
    text-align: center;
    box-shadow:
        0 30px 80px rgba(0,0,0,.35);
    animation: modalPop .25s ease;
}

@keyframes modalPop {
    from {
        transform: scale(.96) translateY(10px);
        opacity: 0;
    }
    to {
        transform: scale(1) translateY(0);
        opacity: 1;
    }
}

.apple-modal-icon {
    font-size: 46px;
    color: #dc2626;
    margin-bottom: 12px;
}

.apple-modal-title {
    font-weight: 700;
    margin-bottom: 8px;
}

.apple-modal-text {
    font-size: 14px;
    color: #374151;
    margin-bottom: 14px;
}

.apple-modal-warning {
    background: rgba(220,38,38,.08);
    border: 1px solid rgba(220,38,38,.25);
    border-radius: 14px;
    padding: 10px 12px;
    font-size: 12px;
    color: #7f1d1d;
    margin-bottom: 20px;
}

.apple-modal-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
}


</style>
@endpush

@section('content')

{{-- HEADER --}}
<div class="row mb-4">
    <div class="col-12">
        <h3 class="apple-title mb-1">
            API & Integrations
        </h3>
        <p class="apple-subtitle">
            Securely connect your organization to external systems
        </p>
    </div>
</div>

<div class="row">
    {{-- MAIN --}}
    <div class="col-xl-8 col-lg-9">

        <div class="apple-card mb-4">
            <div class="card-body">

                <h5 class="apple-title mb-1 d-flex align-items-center gap-2">
                    <i class="fas fa-plug text-muted"></i>
                    API Access
                </h5>
                <p class="apple-subtitle mb-4">
                    Generate and manage your organization’s API token.
                </p>

                {{-- TOKEN (SESSION ONLY) --}}
                @if(session()->has('api_token'))
                    <div class="mb-4">

                        <div class="api-warning mb-3">
                            <strong>🔐 Copy this token now.</strong><br>
                            It will not be shown again for security reasons.
                        </div>

                        <div id="apiToken" class="api-token-box">
                            {{ session('api_token') }}
                        </div>

                        <div class="api-token-actions">
                            <button type="button"
                                    class="btn btn-sm btn-dark rounded-pill px-3"
                                    onclick="copyApiToken()">
                                Copy Token
                            </button>

                            <button type="button"
                                    class="btn btn-sm btn-outline-dark rounded-pill px-3"
                                    onclick="toggleToken()">
                                Hide / Show
                            </button>
                        </div>

                        <div class="api-hint">
                            Treat this token like a password.
                        </div>

                    </div>
                @endif

                {{-- STATUS --}}
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <div class="fw-semibold">
                            API Status
                        </div>
                        <small class="text-muted">
                            Organization-level access
                        </small>
                    </div>

                    @if($organization->api_enabled)
                        <span class="badge rounded-pill bg-success">
                            Enabled
                        </span>
                    @else
                        <span class="badge rounded-pill bg-secondary">
                            Disabled
                        </span>
                    @endif
                </div>

                <div class="apple-divider my-4"></div>

                {{-- ACTIONS --}}
                @can('manage organization settings')

                    @if(!$organization->api_enabled)
              <div class="d-flex flex-wrap gap-2">

    <form method="POST" action="{{ route('organization.api.generate') }}">
        @csrf
        <button type="submit"
                class="badge-action bg-success">
            Enabled • Rotate Token
        </button>
    </form>

    <form method="POST"
          action="{{ route('organization.api.revoke') }}">
        @csrf
        @method('DELETE')

<button type="button"
        class="badge-action bg-danger"
        onclick="openRevokeModal()">
    Revoke Access
</button>

    </form>

</div>

                    @else
                        <div class="d-flex flex-wrap gap-2">

                            <form method="POST"
                                  action="{{ route('organization.api.generate') }}">
                                @csrf

                                <button type="submit"
                                        class="btn btn-outline-dark apple-save">
                                    Rotate Token
                                </button>
                            </form>

                            <form method="POST"
                                  action="{{ route('organization.api.revoke') }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-outline-danger apple-save"
                                        onclick="return confirm('This will immediately disable all API integrations. Continue?')">
                                    Revoke Access
                                </button>
                            </form>

                        </div>
                    @endif

                @else
                    <p class="text-muted small mb-0">
                        Only organization owners or administrators can manage API access.
                    </p>
                @endcan

            </div>
        </div>

    </div>

    {{-- SIDE PANEL --}}
    <div class="col-xl-4 col-lg-3">
        <div class="apple-card">
            <div class="card-body">

                <h6 class="fw-bold mb-3">
                    API Capabilities
                </h6>

                <ul class="small text-muted ps-3 mb-3">
                    <li>Read loans & repayment schedules</li>
                    <li>Fetch client records</li>
                    <li>Sync payments to accounting systems</li>
                    <li>Receive real-time webhooks</li>
                </ul>

                @if($organization->api_token_last_generated_at)
                    <p class="small text-muted mb-0">
                        <strong>Last rotated</strong><br>
                        {{ $organization->api_token_last_generated_at->diffForHumans() }}
                    </p>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
let tokenVisible = true;

function copyApiToken() {
    const tokenText = document.getElementById('apiToken').innerText;
    navigator.clipboard.writeText(tokenText).then(() => {
        alert('API token copied to clipboard');
    });
}

function toggleToken() {
    const el = document.getElementById('apiToken');
    if (tokenVisible) {
        el.style.filter = 'blur(6px)';
        tokenVisible = false;
    } else {
        el.style.filter = 'none';
        tokenVisible = true;
    }
}
</script>
{{-- 🍎 REVOKE API MODAL --}}
<div id="revokeApiModal" class="apple-modal-backdrop d-none">
    <div class="apple-modal">

        <div class="apple-modal-icon">
            <i class="fas fa-plug-circle-xmark"></i>
        </div>

        <h5 class="apple-modal-title">
            Revoke API Access
        </h5>

        <p class="apple-modal-text">
            This will immediately disable all active integrations
            and invalidate the current API token.
        </p>

        <div class="apple-modal-warning">
            Connected systems like accounting software
            will stop syncing until a new token is generated.
        </div>

        <div class="apple-modal-actions">
            <button type="button"
                    class="btn btn-light rounded-pill px-4"
                    onclick="closeRevokeModal()">
                Cancel
            </button>

            <form method="POST"
                  action="{{ route('organization.api.revoke') }}">
                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger rounded-pill px-4">
                    Revoke Access
                </button>
            </form>
        </div>

    </div>
</div>

<script>
function openRevokeModal() {
    document.getElementById('revokeApiModal')
        .classList.remove('d-none');
}

function closeRevokeModal() {
    document.getElementById('revokeApiModal')
        .classList.add('d-none');
}
</script>


@endpush
