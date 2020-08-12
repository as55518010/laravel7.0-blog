<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    // 數據表
    public $table = 'admin_user';
    // 黑名單
    public $guarded  = ['id'];


}
