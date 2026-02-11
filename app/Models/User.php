<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * Mass assignable fields
     */
protected $fillable = [
    'name',
    'email',
    'password',
    'slug',
    'status',
    'special_code',
    'organization_id',
    'branch_id',
    'invitation_token',
    'invited_at',
    'password_set_at',
    'whatsapp_line',
    'whatsapp_phone',
    'address',
    'occupation',
    'type',
    'profile_image',
];


    /**
     * Hidden attributes (not serialized)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Boot method to auto-set slug and special_code
     */


protected static function boot()
{
    parent::boot();

    static::creating(function ($template) {

        $baseSlug = Str::slug($template->name);
        $slug = $baseSlug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count;
            $count++;
        }

        $template->slug = $slug;
    });
}


    /**
     * ======================
     * Relationships
     * ======================
     */

    // 🔗 Each user belongs to one property


        public function getRouteKeyName(): string
    {
        return 'slug';
    }


public function organization()
{
    return $this->belongsTo(\App\Models\Organization::class);
}



    /**
     * ======================
     * Helper methods
     * ======================
     */

    public function isActive(): bool
    {
        return $this->status == 1;
    }

    public function hasProfileImage(): bool
    {
        return !empty($this->profile_image);
    }
}
