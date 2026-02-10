@push('styles')
<style>
/* ===============================
   🍎 APPLE UI – ROLES & PERMISSIONS
================================ */

/* Typography */
.apple-title {
    font-weight: 700;
    letter-spacing: -0.4px;
    color: #111827;
}

.apple-subtitle {
    font-size: 14px;
    color: #6b7280;
}

/* Cards */
.apple-card {
    background: #ffffff;
    border-radius: 22px;
    border: 1px solid rgba(229,231,235,.9);
    box-shadow: 0 20px 60px rgba(0,0,0,.08);
    transition: transform .25s ease, box-shadow .25s ease;
}

.apple-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 26px 70px rgba(0,0,0,.12);
}

/* Inputs */
.apple-input {
    border-radius: 14px;
    padding: 12px 14px;
    border: 1px solid #e5e7eb;
    font-weight: 500;
}

.apple-input:focus {
    border-color: #111827;
    box-shadow: 0 0 0 4px rgba(17,24,39,.08);
}

/* Tables */
.table {
    --bs-table-bg: transparent;
}

.table thead th {
    font-size: 12px;
    font-weight: 600;
    color: #6b7280;
    border-bottom: 1px solid #e5e7eb;
}

.table tbody tr {
    transition: background .15s ease;
}

.table tbody tr:hover {
    background: rgba(17,24,39,.03);
}

.table td {
    vertical-align: middle;
    border-bottom: 1px solid #f1f5f9;
}

/* Buttons */
.btn {
    font-weight: 600;
}

.btn-dark {
    background: #111827;
    border-color: #111827;
}

.btn-dark:hover {
    background: #000;
    border-color: #000;
}

.btn-outline-dark {
    border-radius: 999px;
    padding: 4px 14px;
}

/* Permission Matrix */
.form-check {
    padding-left: 0;
}

.form-switch {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.form-switch .form-check-input {
    width: 44px;
    height: 24px;
    margin-left: 0;
    cursor: pointer;
}

.form-switch .form-check-input:checked {
    background-color: #111827;
    border-color: #111827;
}

.form-check-label {
    font-weight: 500;
    color: #374151;
    cursor: pointer;
}

/* Permission Group Titles */
.permission-group-title {
    font-weight: 700;
    letter-spacing: -.2px;
    text-transform: capitalize;
}

/* Empty states */
.text-muted {
    color: #6b7280 !important;
}

/* Responsive tweaks */
@media (max-width: 768px) {
    .apple-card {
        border-radius: 18px;
    }
}

</style>
@endpush
