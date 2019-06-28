<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/22
 * Time: 16:51
 */

namespace app\api\model;


class ProductImg extends BaseModel
{
    protected $hidden = ['delete_time', 'create_time', 'img_id'];

    public function imgUrl()
    {
        return $this->hasOne('Image', 'img_id', 'id');
    }
}