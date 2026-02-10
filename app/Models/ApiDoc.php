<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiDoc extends Model
{
    protected $fillable = [
        'organization_id',
        'module',
        'title',
        'slug',
        'method',
        'endpoint',
        'description',
        'request_example',
        'response_example',
        'notes',
        'is_active',
    ];

    protected static function booted()
    {
        static::creating(function ($doc) {
            if (!$doc->slug) {
                $doc->slug = Str::slug($doc->title);
            }
        });
    }


            public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
