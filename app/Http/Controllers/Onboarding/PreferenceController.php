<?php

namespace App\Http\Controllers\Onboarding;

use App\Http\Controllers\Controller;
use App\Models\OrganizationPreference;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreferenceController extends Controller
{
    public function create()
    {
        return view('onboarding.setup.preferences');
    }

    public function store(Request $request)
    {
        $request->validate([
            'interest_type'       => 'required|in:flat,reducing',
            'grace_period_days'   => 'required|integer|min:0',
            'penalty_rate'        => 'required|numeric|min:0',
            'email_otp_enabled'   => 'nullable|boolean',
            'temp_password_enabled' => 'nullable|boolean',

            // COLORS
            'primary_color'   => 'required|regex:/^#([A-Fa-f0-9]{6})$/',
            'secondary_color' => 'required|regex:/^#([A-Fa-f0-9]{6})$/',
            'accent_color'    => 'nullable|regex:/^#([A-Fa-f0-9]{6})$/',

            // LOGO
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $organization = auth()->user()->organization;

        /*
        |--------------------------------------------------------------------------
        | LOGO UPLOAD
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')
                ->store('organization-logos', 'public');

            $organization->update([
                'logo' => $logoPath
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE ORGANIZATION ACTIVE FLAG
        |--------------------------------------------------------------------------
        */
        // $organization->update([
        //     'active' => $request->input('active', false)
        // ]);

        /*
        |--------------------------------------------------------------------------
        | SAVE PREFERENCES
        |--------------------------------------------------------------------------
        */
        OrganizationPreference::create([
            'organization_id' => $organization->id,
            'interest_type' => $request->interest_type,
            'grace_period_days' => $request->grace_period_days,
            'penalty_rate' => $request->penalty_rate,
            'email_otp_enabled' => $request->boolean('email_otp_enabled'),
            'temp_password_enabled' => $request->boolean('temp_password_enabled'),

            'primary_color'   => $request->primary_color,
            'secondary_color' => $request->secondary_color,
            'accent_color'    => $request->accent_color,
        ]);

        return redirect()->route('setup.complete');
    }
}
