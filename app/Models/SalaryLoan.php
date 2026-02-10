<?php

namespace App\Models;
    use App\Models\SalaryLoanContract;
use App\Models\SalaryLoanContractTemplate;
use Illuminate\Database\Eloquent\Model;

class SalaryLoan extends Model
{
    protected $fillable = [
        // ======================
        // Scope / Ownership
        // ======================
        'organization_id',
        'branch_id',
        'client_id',
        'created_by',

        // ======================
// Early Settlement
// ======================
'early_settlement_amount',
'early_settlement_date',
'early_settlement_by',


        // ======================
        // Identity
        // ======================
        'loan_no',

        // ======================
        // Core Loan Data
        // ======================
        'loan_amount',
        'interest_rate',          // monthly %
        'months',
        'slug',

        // ======================
        // Processing Fee
        // ======================
        'processing_fee_type',    // fixed | percentage
        'processing_fee_value',   // raw input
        'processing_fee_mode',    // add_to_loan | deduct_upfront
        'processing_fee_amount',  // computed
        'disbursed_amount',       // actual cash client receives

        // ======================
        // Payroll Logic
        // ======================
        'pay_day',                // 1–28
        'prorate_first_month',
        'first_month_interest',
        'first_due_date',

        // ======================
        // Calculated Totals
        // ======================
        'monthly_deduction',
        'total_payable',

        // ======================
        // Lifecycle
        // ======================
        'status',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        // Amounts
        'loan_amount'            => 'decimal:2',
        'interest_rate'          => 'decimal:2',
        'processing_fee_value'   => 'decimal:2',
        'processing_fee_amount'  => 'decimal:2',
        'disbursed_amount'       => 'decimal:2',
        'monthly_deduction'      => 'decimal:2',
        'total_payable'          => 'decimal:2',
        'first_month_interest'   => 'decimal:2',

        // Dates
        'first_due_date'         => 'date',
        'start_date'             => 'date',
        'end_date'               => 'date',

        // Booleans
        'prorate_first_month'    => 'boolean',

        // Early settlement
'early_settlement_amount' => 'decimal:2',
'early_settlement_date'   => 'date',

    ];

    /* =====================
       RELATIONSHIPS
    ===================== */

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
  /* ===============================
       PENALTY PAYMENTS
    =============================== */
    public function penaltyPayments()
    {
        return $this->hasMany(
            SalaryLoanPenaltyPayment::class,
            'salary_loan_id'
        );
    }





public function generateContract()
{
    $template = SalaryLoanContractTemplate::where(
        'organization_id',
        $this->organization_id
    )->first();

    if (!$template) {
        return null;
    }

    $content = str_replace([
        '{{client_name}}',
        '{{loan_amount}}',
        '{{interest_rate}}',
        '{{months}}',
        '{{organization_name}}',
        '{{start_date}}',
        '{{end_date}}',
    ],[
        $this->client->first_name.' '.$this->client->last_name,
        number_format($this->loan_amount,2),
        $this->interest_rate,
        $this->months,
        $this->organization->name,
        optional($this->start_date)->format('d M Y'),
        optional($this->end_date)->format('d M Y'),
    ], $template->body);   // ✅ FIXED

    return SalaryLoanContract::updateOrCreate(
        ['salary_loan_id' => $this->id],
        ['html' => $content]
    );
}




    public function contract()
{
    return $this->hasOne(SalaryLoanContract::class);
}




    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function payments()
{
    return $this->hasMany(SalaryLoanPayment::class);
}




    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function penalties()
{
    return $this->hasMany(SalaryLoanPenalty::class);
}


    /* =====================
       HELPERS (OPTIONAL BUT GOLD)
    ===================== */


    public function getIsEarlySettledAttribute(): bool
{
    return !is_null($this->early_settlement_amount);
}


    public function getBalanceAttribute()
    {
        // placeholder for when you add payments
        return max($this->total_payable - ($this->paid_amount ?? 0), 0);
    }

    public function isRunning(): bool
    {
        return $this->status === 'running';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }


    public function getTotalPaidAttribute(): float
{
    return (float) (
        $this->payments()->sum('amount') +
        ($this->penalty_paid_amount ?? 0)
    );
}

// public function getOutstandingBalanceAttribute(): float
// {
//     return max(
//         $this->total_payable - $this->total_paid,
//         0
//     );
// }


    public function getRouteKeyName()
{
    return 'slug';
}

public function getSettlementLabelAttribute(): string
{
    return $this->is_early_settled
        ? 'Early Settled'
        : 'Normal';
}
public function getOutstandingBalanceAttribute(): float
{
    // ✅ Early settlement overrides all math
    if ($this->is_early_settled) {
        return 0.0;
    }

    return max(
        $this->total_payable - $this->total_paid,
        0
    );
}



}
