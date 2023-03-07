<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grn extends Model
{
    use HasFactory;
    protected $table = 'grn';
    protected $primaryKey = 'id';
    protected $fillable = ['SupplierID', 'userID', 'locationID', 'note' ];
}
