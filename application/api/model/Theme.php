<?php

namespace app\api\model;

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

    /** 获取简单的列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getsimpleList()
    {
        $ids = request()->param('ids');
        return self::with('topicImg,headImg')->select($ids);
    }

    public static function getComplexList()
    {

    }

}
