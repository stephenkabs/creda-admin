@include('core.roles.style')
<div class="row">

@foreach($permissions->groupBy(function ($p) {
    return explode(' ', $p->name)[1] ?? 'general';
}) as $group => $groupPermissions)

    <div class="col-md-6 mb-4">
        <div class="apple-card">
            <div class="card-body p-3">

                <h6 class="fw-bold mb-3 text-capitalize">
                    {{ str_replace('_', ' ', $group) }}
                </h6>

                @foreach($groupPermissions as $permission)
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input"
                               type="checkbox"
                               name="permissions[]"
                               value="{{ $permission->id }}"
                               {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                        <label class="form-check-label">
                            {{ ucfirst($permission->name) }}
                        </label>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endforeach
</div>
