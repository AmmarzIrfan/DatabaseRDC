<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table='tickets';
    protected $fillable = [
        'cust_id',
        'serial_number',
        'ticket_type',
        'quantity',
        'purchase_date',
        'validity_start',
        'validity_end',
        'status',
        'price',
        'payment_status',

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ticket) {
            $ticket->serial_number = $ticket->id;
        });
    }
    public function visitor()
    {
        return $this->belongsTo(VisitorProfile::class, 'cust_id', 'id');
    }
    public function accesslog()
    {
        return $this->hasOne(AccessLog::class, 'ticket_id', 'id');
    }
    }
