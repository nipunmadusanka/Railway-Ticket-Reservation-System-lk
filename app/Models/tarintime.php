<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarintime extends Model
{
            protected $table = 'tarintimes';
            protected $primaryKey = 'id';
            protected $fillable = ['trainName', 'from', 'startTime', 'to', 'endTime', 'seatN'];
}
