<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_driver_instructions extends Model
{
    use HasFactory;
    protected $table="order_driver_instructions";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
