<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationPreference extends Model
{
    protected $fillable = [
      'organization_id',
        'interest_type',
        'repayment_policy', // ✅ ADD THIS
        'grace_period_days',
        'penalty_rate',
        'email_otp_enabled',
        'temp_password_enabled',

        'primary_color',
        'secondary_color',
        'accent_color',
        'logo',
    ];
}
