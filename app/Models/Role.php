<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::slug($value);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
