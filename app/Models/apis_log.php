<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apis_log extends Model
{
    use HasFactory;
    protected $table="apis_log";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
