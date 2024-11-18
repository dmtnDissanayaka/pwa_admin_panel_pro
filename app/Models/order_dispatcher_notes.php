<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_dispatcher_notes extends Model
{
    use HasFactory;
    protected $table="order_dispatcher_notes";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
