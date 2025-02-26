<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'developer_id', 'admin_id', 'assigned_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function developer()
    {
        return $this->belongsTo(User::class, 'developer_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}