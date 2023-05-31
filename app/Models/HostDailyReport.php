<?php

namespace App\Models;

use Carbon\Carbon;

class HostDailyReport extends BaseModel
{

    public function host()
    {
        return $this->belongsTo(Host::class,'host_id','uuid');
    }
    public function getCreatedBy($value)
    {
        return $value = Carbon::parse($value)->format('Y-m-d');
    }
}
