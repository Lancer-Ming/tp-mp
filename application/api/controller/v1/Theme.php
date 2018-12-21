<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/20
 * Time: 15:09
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\validate\IDsCheck;
use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeMissException;
use think\Controller;

class Theme extends Controller
{
    public function getSimpleList($ids)
    {
        (new IDsCheck())->goCheck();
        $themes = ThemeModel::getsimpleList($ids);
        if($themes->isEmpty()) {
            throw new ThemeMissException();
        }
        return json($themes);
    }

    public function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $themes = ThemeModel::getComplexOne($id);
        if(!$themes) {
            throw new ThemeMissException();
        }
        return json($themes);
    }

}