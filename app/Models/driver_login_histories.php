<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver_login_histories extends Model
{
    use HasFactory;
    protected $table="driver_login_histories";
    protected $primaryKey = 'id';
    protected $guarded = [];




}
