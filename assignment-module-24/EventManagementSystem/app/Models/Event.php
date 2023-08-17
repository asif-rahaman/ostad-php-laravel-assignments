<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    // Event.php
    public function attendees()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
