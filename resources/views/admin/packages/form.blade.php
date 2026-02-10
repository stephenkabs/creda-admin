<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">

        <div class="mb-3">
            <label class="form-label fw-semibold">Name</label>
            <input name="name"
                   class="form-control"
                   value="{{ old('name', $package->name ?? '') }}"
                   required>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Price (ZMW)</label>
                <input name="price"
                       type="number"
                       class="form-control"
                       value="{{ old('price', $package->price ?? '') }}"
                       required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Max Users</label>
                <input name="max_users"
                       type="number"
                       class="form-control"
                       value="{{ old('max_users', $package->max_users ?? '') }}"
                       required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-semibold">Max Borrowers</label>
                <input name="max_borrowers"
                       type="number"
                       class="form-control"
                       value="{{ old('max_borrowers', $package->max_borrowers ?? '') }}"
                       required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">SMS Limit</label>
            <input name="sms_limit"
                   type="number"
                   class="form-control"
                   value="{{ old('sms_limit', $package->sms_limit ?? '') }}">
        </div>

        <div class="form-check form-switch mb-2">
            <input class="form-check-input"
                   type="checkbox"
                   name="api_access"
                   value="1"
                   {{ old('api_access', $package->api_access ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">
                API Access Enabled
            </label>
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input"
                   type="checkbox"
                   name="active"
                   value="1"
                   {{ old('active', $package->active ?? true) ? 'checked' : '' }}>
            <label class="form-check-label">
                Active Package
            </label>
        </div>

    </div>
</div>
