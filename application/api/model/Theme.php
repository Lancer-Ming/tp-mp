<?php

namespace app\api\model;

use think\Collection;
use think\Model;

class Theme extends Model
{
    protected $hidden = ['topic_img_id', 'head_img_id', 'update_time', 'delete_time'];
    public function topicImg()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function headImg()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }


    /** 获取简单的列表
     * @param $ids
     * @return false|\PDOStatement|string|Collection
     */
    public static function getsimpleList($ids)
    {
        return self::with('topicImg,headImg')->select($ids);
    }

    public static function getComplexOne($id)
    {
        $themes = self::with('product')->where('id', $id)->select();
        return $themes;
    }

}
