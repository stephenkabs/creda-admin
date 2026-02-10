<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;

class Client extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'client_address',
        'phone',
        'email',
        'nrc',
        'date_of_birth',
        'gender',
        'marital_status',
        'occupation',
        'employee_no',
        'reference_no',
        'mobile_money',
        'bank_name',
        'bank_account',
        'next_of_kin_name',
        'next_of_kin_phone',
        'branch_id',
        'user_id',
        'organization_id',
        'slug',
        'document_path',
        'status',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Default attributes
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /* =====================================================
       RELATIONSHIPS
    ===================================================== */

    public function user()
    {
        return $this->belongsTo(User::class);
    }



public function branch()
{
    return $this->belongsTo(Branch::class);
}



    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function assets()
{
    return $this->hasMany(ClientAsset::class);
}


public function salaryLoans()
{
    return $this->hasMany(SalaryLoan::class);
}





    /* =====================================================
       ACCESSORS
    ===================================================== */

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getDocumentUrlAttribute(): ?string
    {
        return $this->document_path
            ? Storage::disk('spaces')->url($this->document_path)
            : null;
    }

    /* =====================================================
       SCOPES
    ===================================================== */

    public function scopeForOrganization($query, $organizationId)
    {
        return $query->where('organization_id', $organizationId);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeBlocked($query)
    {
        return $query->where('status', 'blocked');
    }
}
