<?php

namespace App\Models;

class CallLog extends BaseModel
{
    /**
     * Get the user that owns the CallLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
    /**
     * Get the host that owns the CallLog
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo(User::class, 'host_id', 'uuid');
    }
    public function host_token()
    {
        return $this->hasOne(TokenHistory::class, 'type_id', 'uuid');
    }

    public function user_token()
    {
        return $this->hasOne(TokenHistory::class, 'user_id', 'uuid');
    }

}
