<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //1、关联的数据表
    public $table = 'user';

    // 2、主键
    public $primarykey = 'user_id';

    // 3、允许批量操作
    protected $guarded = [];

    public $timestamps = false;

}


