<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'type',
        'name',
        'reference_no',
        'serial_no',
        'registration_no',
        'location',
        'estimated_value',
        'condition',
        'is_collateral',
        'status',
        'document_path',
        'notes',
    ];

    protected $casts = [
        'is_collateral' => 'boolean',
        'estimated_value' => 'decimal:2',
    ];

    /* ===============================
       RELATIONSHIPS
    =============================== */

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /* ===============================
       SCOPES
    =============================== */

    public function scopeCollateral($query)
    {
        return $query->where('is_collateral', true);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
