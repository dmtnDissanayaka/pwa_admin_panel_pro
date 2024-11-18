<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblEmailVerification extends Model
{
    use HasFactory;
    protected $table="email_verification";
    public $timestamps=true;
    protected $primaryKey = 'Id';
    protected $guarded = [];
}
