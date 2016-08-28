<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsSku extends Model
{
    //使用软删除
    use SoftDeletes;
    
    //设置表名
    public $table = 'goods_sku';
    
}
