<?php

namespace App\Models;

class HostOnlineHistory extends BaseModel
{
    /**
     * Get the host that owns the HostOnlineHistory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(User::class, 'host_user_id', 'uuid');
    }
}
