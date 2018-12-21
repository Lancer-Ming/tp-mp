<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'create_time', 'update_time', 'pivot', 'category_id', 'from'];

    public function getMainImgUrlAttr($value, $data)
    {
        return $this->handleImgUrl($value, $data);
    }

    public static function getRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }

}
