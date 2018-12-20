<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/26
 * Time: 14:12
 */

namespace app\api\model;


class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time', 'update_time'];

    public function getUrlAttr($value, $data)
    {
        return $this->handleImgUrl($value, $data);
    }
}