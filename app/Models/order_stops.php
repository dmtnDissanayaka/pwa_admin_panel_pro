<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_stops extends Model
{
    use HasFactory;
    protected $table="order_stops";
    protected $primaryKey = 'id';
    protected $guarded = [];

}
