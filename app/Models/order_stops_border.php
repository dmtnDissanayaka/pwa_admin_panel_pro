<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_stops_border extends Model
{
    use HasFactory;
    protected $table="order_stops[border-x]";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
