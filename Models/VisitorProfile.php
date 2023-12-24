<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorProfile extends Model
{
    use HasFactory;
    protected $table = 'visitor_profiles';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'residency',

    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class, 'cust_id', 'id');
    }
    public function accesslog()
    {
        return $this->hasMany(AccessLog::class, 'cust_id', 'id');
    }

}
