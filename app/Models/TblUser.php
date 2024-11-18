<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TblUser extends Authenticatable
{
    use HasFactory;
    protected $table="admin_users";
    public $timestamps=false;
    protected $primaryKey = 'id';
    protected $guarded = [];

    // protected $hidden = [
    //     'pw',
    // ];

    public function username()
    {
        return 'username';
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    // public function menu_permissions()
    // {
    //     return $this->hasMany(TblMenuPermissions::class,'intUserId','id');
    // }

    // public function emp()
    // {
    //     return $this->hasOne(TblEmp::class,'ID','Emp_id');
    // }

    // public function denied_permission()
    // {
    //     return $this->hasMany(TblOperationPermissions::class,'UserId','id');
    // }
}
