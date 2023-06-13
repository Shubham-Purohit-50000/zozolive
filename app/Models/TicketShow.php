<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketShow extends BaseModel
{
    use HasFactory;

    protected $table='ticket_shows';

    protected $guarded = [];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id', 'uuid');
    }  
}
