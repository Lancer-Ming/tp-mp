<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 15:20
 */

namespace app\api\controller\v1;


use app\api\controller\service\UserToken;
use app\api\model\User;
use app\api\validate\LoginValidate;
use think\Controller;

class Base extends Controller
{
    /** 返回成功的json
     * @param $data
     * @return \think\response\Json
     */
    protected function response($data)
    {
        if (! empty($data)) {
            return json([
                'errorCode' => 0,
                'data' => $data
            ]);
        }
    }

    protected function reponseOk()
    {
        return json([
            'msg' => 'ok',
            'errorCode' => 0
        ], 201);
    }

}