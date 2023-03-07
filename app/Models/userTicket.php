<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTicket extends Model
{
    protected $table = 'user_tickets';
    protected $primaryKey = 'id';
    protected $fillable = ['UserID', 'from', 'to', 'children', 'adult'];
}
