<?php

namespace App\Models;
use Carbon\Carbon;

class HostTipMenu extends BaseModel
{

    public function host()
    {
        return $this->belongsTo(Host::class,'host_id');
    }
    
}
