<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    protected $table='accesslogs';
    protected $fillable = [
        'cust_id',
        'ticket_id',
        'entry_status',
        'entry_timestamps',

    ];
    public function visitor()
    {
        return $this->belongsTo(VisitorProfile::class, 'cust_id', 'id');
    }
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }


}
