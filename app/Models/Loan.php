<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'percentage',
        'interest',
        'total',
        'months',
        'monthly_payment',
           'loan_type',

        'payment_type',
        'client_segment',
        'client_category',
        'repayment_policy', // ✅ ADD THIS
        'approved_by',

        'status',
        'slug',

    'processing_fee',        // ✅ NEW
    'penalty_fee',           // ✅ NEW
    'payments_start_date',   // ✅ NEW
    'penalty_applied_at',    // ✅ NEW


        'interest_type',
        'grace_period_days',

        'is_defaulter',

        'client_id',
        'branch_id',
        'user_id',
    ];

    protected $casts = [
        'amount'            => 'decimal:2',
        'interest'          => 'decimal:2',
        'total'             => 'decimal:2',
        'monthly_payment'   => 'decimal:2',
        'percentage'        => 'decimal:2',

        'months'            => 'integer',
        'grace_period_days' => 'integer',

        'is_defaulter'      => 'boolean',
    ];

    /* =====================================================
       RELATIONSHIPS
    ===================================================== */

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function payments()
{
    return $this->hasMany(LoanPayment::class);
}

public function penalties()
{
    return $this->hasMany(\App\Models\LoanPenalty::class);
}


public function contract()
{
    return $this->hasOne(LoanContract::class);
}




        public function getRouteKeyName()
    {
        return 'slug';
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * (Future) Loan repayments / installments
     */
    public function repaymentSchedules()
    {
        return $this->hasMany(
            LoanRepaymentSchedule::class,
            'loan_id'
        )->orderBy('month_no');
    }

    public function schedules()
{
    return $this->repaymentSchedules();
}

    /**
     * (Future) Collateral assets
     * Requires pivot table loan_asset
     */
    public function assets()
    {
        return $this->belongsToMany(
            ClientAsset::class,
            'loan_assets'
        )->withTimestamps();
    }

    /* =====================================================
       SCOPES
    ===================================================== */

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['approved', 'active']);
    }

    public function scopeDefaulters($query)
    {
        return $query->where('is_defaulter', true);
    }



    public function dues()
    {
        return $this->hasMany(Due::class, 'loan_id');
    }




    // App\Models\Loan.php

public function getReferenceAttribute(): string
{
    // return 'loan-'.$this->id;
    // or if you prefer:
    return 'LN-'.$this->id.'-'.$this->created_at->format('Ymd');
}



    /* =====================================================
       HELPERS
    ===================================================== */

    public function isEditable(): bool
    {
        return $this->status === 'pending';
    }

    public function isActive(): bool
    {
        return in_array($this->status, ['approved', 'active']);
    }

    public function outstandingBalance(): float
    {
        $paid = $this->payments()->sum('amount');

        return max(
            0,
            ($this->total ?? 0) - $paid
        );
    }


    public function getComputedTotalInterestAttribute()
{
    return $this->repaymentSchedules->sum('interest_amount');
}

public function getComputedTotalPayableAttribute()
{
    return $this->repaymentSchedules->sum('payment_amount');
}

}
