<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/22
 * Time: 23:09
 */

namespace app\api\controller\v1;


use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;
use think\Controller;
use think\Request;

class Banner extends Controller
{
    public function getBanner(Request $request)
    {
        (new IDMustBePositiveInt())->goCheck();

        $id = $request->param('id');
        $banners = BannerModel::getBannerById($id);

        if ($banners->isEmpty()) {
            throw new BannerMissException();
        }
        return json($banners);
    }
}