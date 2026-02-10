<table class="table table-striped">
    <thead>
        <tr>
            <th data-priority="1">Names</th>
            <th data-priority="1">Country/City</th>
            <th data-priority="1">Package Plan</th>
            <th data-priority="1">Roles</th>
            <th data-priority="6">Action</th>
        </tr>
    </thead>
    <tbody id="table-body">
        @foreach ($users as $user)
            <tr>
                <td>
                    {{ $user->name }}<br>
                    <span style="font-size: 11px; color:rgb(112, 112, 112);">
                        Email: {{ $user->email }}
                    </span>
                </td>
                <td>
                    {{ $user->country_id ?? 'No Country' }}<br>
                    <span style="font-size: 11px; color:rgb(112, 112, 112);">
                        City: {{ $user->city }}
                    </span>
                </td>
                <td>
                    <b style="font-size: 12px">
                        {{ $user->pricingPlan->name ?? 'N/A' }}
                    </b><br>
                    <span style="font-size: 9px; color: rgb(112, 112, 112);">
                        Price: {{ formatCurrency($user->pricingPlan->price ?? 0) }}
                    </span>
                </td>
                <td>
                    @if (!empty($user->getRoleNames()))
                        @foreach ($user->getRoleNames() as $rolename)
                            <a class="btn btn-info btn-sm waves-effect">{{ $rolename }}</a>
                        @endforeach
                    @endif
                </td>
                <td>
                    <button type="button"
                        class="btn btn-primary waves-effect"
                        data-bs-toggle="modal"
                        data-bs-target="#editUserModal"
                        data-user-slug="{{ $user->slug }}"
                        data-user-name="{{ $user->name }}"
                        data-user-email="{{ $user->email }}"
                        data-user-country="{{ $user->country_id }}"
                        data-user-city="{{ $user->city }}"
                        data-user-pricing-id="{{ $user->pricing_id }}">
                        Edit User
                    </button>

                    <button type="button"
                        class="btn btn-primary waves-effect"
                        data-bs-toggle="modal"
                        data-bs-target="#editPricingModal"
                        data-user-slug="{{ $user->slug }}"
                        data-user-name="{{ $user->name }}"
                        data-user-pricing-id="{{ $user->pricing_id }}">
                        Upgrade Account Plan
                    </button>

                    <button type="button"
                        class="btn btn-{{ $user->active ? 'danger' : 'success' }} waves-effect waves-light"
                        data-bs-toggle="modal"
                        data-bs-target="#statusModal"
                        data-user-name="{{ $user->name }}"
                        data-user-slug="{{ $user->slug }}"
                        data-active="{{ $user->active }}">
                        <i class="dripicons-{{ $user->active ? 'ban' : 'checkmark' }}"></i>
                        {{ $user->active ? 'Deactivate' : 'Activate' }}
                    </button>

                    <button type="button"
                        class="btn btn-danger waves-effect"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-route="{{ route('user.destroy', $user->slug) }}">
                        <i class="dripicons-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
