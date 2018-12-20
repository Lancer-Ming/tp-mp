<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/26
 * Time: 14:04
 */

namespace app\api\model;

class BannerItem extends BaseModel
{
    protected $hidden = ['id', 'img_id', 'banner_id', 'update_time', 'delete_time'];
    public function imgs()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}