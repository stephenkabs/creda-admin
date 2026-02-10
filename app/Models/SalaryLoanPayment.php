<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryLoanPayment extends Model
{
    protected $fillable = [
        'salary_loan_id',

        // schedule
        'due_date',      // expected salary deduction date
        'paid_at',       // actual payment date

        // money
        'amount',

        // status
        'status',        // pending | paid | missed

        // audit
        'received_by',
                'created_by',
        'notes',
    ];

    protected $casts = [
        'due_date' => 'date',
        'paid_at'  => 'date',
        'amount'   => 'decimal:2',
    ];

    /* =====================
       RELATIONSHIPS
    ===================== */

    public function loan()
    {
        return $this->belongsTo(SalaryLoan::class, 'salary_loan_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    /* =====================
       HELPERS
    ===================== */

    public function isPaid(): bool
    {
        return $this->status === 'paid';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

}
