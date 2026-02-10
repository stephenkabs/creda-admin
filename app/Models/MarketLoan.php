<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class MarketLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'branch_id',
        'slug',
        'client_id',

        // amounts
        'principal_amount',
        'interest_rate',
        'interest_amount',
        'total_payable',
        'daily_payment',
        'repayment_days',

        // payment tracking
        'paid_amount',
        'payment_start_date',
        'end_date',

        // penalties
        'penalty_per_day',
        'penalty_amount',
        'missed_days',

        // status
        'status',
    ];

    protected $casts = [
        'payment_start_date' => 'date',
        'end_date'           => 'date',
        'paid_amount'        => 'decimal:2',
        'penalty_amount'     => 'decimal:2',
    ];

    /* =====================================================
       RELATIONSHIPS
    ===================================================== */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


        public function getRouteKeyName()
    {
        return 'slug';
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function payments()
    {
        return $this->hasMany(MarketLoanPayment::class);
    }

    /* =====================================================
       ACCESSORS & HELPERS
    ===================================================== */

    /**
     * Remaining balance (loan + penalties)
     */
    public function getBalanceAttribute()
    {
        return max(
            0,
            ($this->total_payable + $this->penalty_amount) - $this->paid_amount
        );
    }

    /**
     * Check if loan is completed
     */
    public function isCompleted(): bool
    {
        return $this->balance <= 0;
    }

    /**
     * Check if loan has started repayment
     */
    public function hasStarted(): bool
    {
        return today()->gte($this->payment_start_date);
    }


    public function marketLoan()
{
    return $this->belongsTo(MarketLoan::class, 'market_loan_id');
}


    /**
     * Days remaining
     */
    public function getDaysRemainingAttribute()
    {
        if (!$this->end_date) {
            return null;
        }

        return max(0, today()->diffInDays($this->end_date, false));
    }

    /**
     * Check if payment is expected today
     */
    public function paymentDueToday(): bool
    {
        if (!$this->hasStarted() || $this->status !== 'active') {
            return false;
        }

        return !$this->payments()
            ->whereDate('paid_at', today())
            ->exists();
    }
}
