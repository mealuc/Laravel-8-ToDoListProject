<?php

namespace App\Models;

use App\Events\ToDoCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dispatchesEvents = [
        "message" => ToDoCreatedEvent::class
    ];
}
