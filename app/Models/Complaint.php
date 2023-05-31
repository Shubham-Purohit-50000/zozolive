<?php

namespace App\Models;

class Complaint extends BaseModel
{
    /**
     * Get the user that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
    /**
     * Get the host that owns the Complaint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id', 'user_id');
    }
}
