<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanRepaymentSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'month_no',
        'due_date',
        'opening_balance',
        'interest_amount',
        'principal_amount',
        'payment_amount',
        'closing_balance',
        'comment',
        'paid_amount',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'opening_balance' => 'decimal:2',
        'interest_amount' => 'decimal:2',
        'principal_amount' => 'decimal:2',
        'payment_amount' => 'decimal:2',
        'closing_balance' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];


    protected static function booted()
{
    static::saving(function ($schedule) {
        $schedule->total_due = round(
            $schedule->payment_amount + $schedule->penalty_amount,
            2
        );
    });
}


    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function payments()
{
    return $this->hasMany(
        LoanPayment::class,
        'loan_repayment_schedule_id'
    );
}

public function getRouteKeyName()
{
    return 'id';
}


}
