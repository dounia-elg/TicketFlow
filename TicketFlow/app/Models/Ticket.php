<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'priority', 'operating_system_id', 'software_id', 'client_id', 'status'
    ];

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
