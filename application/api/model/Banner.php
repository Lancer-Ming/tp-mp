<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/24
 * Time: 22:04
 */

namespace app\api\model;

class Banner extends BaseModel
{
    protected $hidden = ['id', 'delete_time', 'update_time'];
    public static function getBannerById($id)
    {
        $banner = self::with(['bannerItems', 'bannerItems.imgs'])->select($id);
        return $banner;
    }

    public function bannerItems()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }
}