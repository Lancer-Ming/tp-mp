<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/22
 * Time: 23:09
 */

namespace app\api\controller\v1;


use app\api\validate\testValidate;
use think\Request;
use think\Validate;

class Banner
{
    public function getBanner(Request $request)
    {
        $id = $request->param('id');

        $validate = new testValidate();
        $result = $validate->check(['id' => $id]);
        var_dump($result);
    }
}