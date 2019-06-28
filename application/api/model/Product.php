<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = ['delete_time', 'create_time', 'update_time', 'pivot', 'category_id', 'from'];

    public function img()
    {
        return $this->hasMany('ProductImg', 'product_id', 'id');
    }

    public function property()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }



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

    public static function getProductsByCategoryID(
        $categoryID, $paginate = true, $page = 1, $size = 30)
    {
        $query = self::where('category_id', $categoryID);
        if (!$paginate) {
            return $query->select();
        } else {
            // paginate 第二参数true表示采用简洁模式，简洁模式不需要查询记录总数
            return $query->paginate($size, true, ['page' => $page]);
        }
    }

    public static function getProductDetail($id)
    {
        $product = self::with(['img.imgUrl', 'property'])->find($id);
        return $product;
    }

}
