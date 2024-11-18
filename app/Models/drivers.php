<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drivers extends Model
{
    use HasFactory;
    protected $table="drivers";
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $appends = ['driver_status','driver_version','driver_company'];

    function history()  {
        return $this->hasOne(driver_login_histories::class,'user_id','id');
    }

    public function getDriverStatusAttribute()
    {
        $status = 'Offline'; // Default to 'Offline'

        $result = driver_login_histories::where("user_id", $this->driver_id)
            ->where('activity', 'Login')
            ->whereDate('created_at', today())
            ->first();

        if ($result) {
            $status = 'Online';
        }

        return $status;
    }
    public function getDriverVersionAttribute()
    {
        $result = driver_login_histories::where("user_id", $this->driver_id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($result) {
            $version = $result->pwa_version;
        } else {
            $version = '';
        }

        return $version;
    }
    public function getDriverCompanyAttribute()
    {
        $result = companies::where("company_id", $this->company_id)
            ->first();

        if ($result) {
            $com_name = $result->company_name;
        } else {
            $com_name = '';
        }

        return $com_name;
    }





}
