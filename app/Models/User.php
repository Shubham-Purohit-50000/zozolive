<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LaratrustUserTrait;

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'role_id',
        'fcm_token',
        'coin',
        'firebase_id',
        'avatar',
        'user_id',
        'dob',
        'about',
        'gender',
        'plain_password',
        'is_free_call_used',
        'device_id',
        'username',
        'provider',
        'provider_id',
        'otp',
        'otp_expired_at',
        'from',
        'email_verified_at',
        'token',
        'profile_image',
        'background_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'uuid');
    }

    // public function hasRole($role)
    // {
    //     $user_role = auth()->user()->role->name;
    //     if($user_role == $role)
    //         return true;
    //     return false;
    // }
    // public function attachRole($role)
    // {
    //     $roleId = Role::where('name', $role)->value('uuid');
    //     if(!$roleId){
    //         $roleId = Role::create([
    //             'name'          => $role,
    //             'display_name'  => ucfirst($role)
    //         ]);
    //     }
    //     $this->update([
    //         'role_id'   => $roleId
    //     ]);
    // }
    // public function detachRole()
    // {
    //     auth()->user()->update([
    //         'role_id'   => null
    //     ]);
    // }
    public function scopeWhereEmail($query, $value)
    {
        return $query->where('email', $value);
    }

    /**
    * Get the user associated with the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function model()
    {
        return $this->hasOne(Host::class, 'user_id', 'uuid');
    }

    /**
     * Get all of the favorites for the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(HostFavourite::class, 'host_user_id', 'uuid');
    }
}
