<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Host extends BaseModel
{
    protected $guarded = [];

    /**
     * Get all of the gallery for the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery()
    {
        return $this->hasMany(HostGallery::class, 'host_id', 'uuid');
    }

    /**
     * Get the user that owns the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function specific()
    {
        return $this->belongsTo(Specific::class, 'specific_id', 'uuid');
    }

    /**
     * Get the agency that owns the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id', 'uuid');
    }

    /**
     * Get all of the calls for the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calls()
    {
        return $this->hasMany(CallLog::class, 'host_id', 'uuid');
    }

    /**
     * Get all of the working for the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function working()
    {
        return $this->hasMany(WorkMode::class, 'host_id', 'uuid');
    }

    /**
     * Get the language that owns the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id', 'uuid');
    }

    /**
     * Get the subculture that owns the Host
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subculture(): BelongsTo
    {
        return $this->belongsTo(Subculture::class, 'subculture_id', 'uuid');
    }

    public function ticketShow(): BelongsTo
    {
        return $this->belongsTo(TicketShow::class, 'user_id', 'host_id');
    }

    
}
