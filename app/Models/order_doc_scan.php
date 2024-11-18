<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_doc_scan extends Model
{
    use HasFactory;
    protected $table="order_doc_scan";
    protected $primaryKey = 'id';
    protected $guarded = [];
}
