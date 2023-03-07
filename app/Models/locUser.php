<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locUser extends Model
{
    use HasFactory;
    protected $table = 'loc_user';
    protected $primaryKey = 'id';
    protected $fillable = ['locationID', 'UserID', 'status' ];
}
