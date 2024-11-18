<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_header_infomation extends Model
{
    use HasFactory;
    protected $table="order_header_infomation";
    // public $timestamps=true;
    protected $primaryKey = 'company_id';
    protected $guarded = [];
}
