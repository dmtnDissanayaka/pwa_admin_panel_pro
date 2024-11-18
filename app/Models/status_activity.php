<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_activity extends Model
{
    use HasFactory;

    protected $table="status_activity";
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $guarded=[];
}
