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
use think\Controller;

class Theme extends Controller
{
    public function getSimpleList()
    {
        (new IDsCheck())->goCheck();
        $themes = ThemeModel::getsimpleList();
        return json($themes);
    }

    public function getComplexList()
    {
        (new IDMustBePositiveInt())->goCheck();

    }

}