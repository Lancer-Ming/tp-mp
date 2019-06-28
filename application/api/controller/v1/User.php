<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 15:20
 */

namespace app\api\controller\v1;


use app\api\controller\service\UserToken;
use app\api\model\User as UserModel;
use app\api\validate\LoginValidate;
use app\lib\exception\SuccessMessage;

class User extends Base
{
    public function login()
    {
        // 验证
        (new LoginValidate())->goCheck();

        // 查询数据库
        $params = request()->param();
        $token = UserModel::login($params);

        return $this->response(compact('token'));
    }

    /** 创建用户
     * @param UserModel $user
     * @return \think\response\Json
     * @throws \app\lib\exception\ParameterException
     */
    public function create(UserModel $user)
    {
        // 验证
        (new LoginValidate())->goCheck();
        // 添加到数据库
        $username = input('username');
        $password = input('password');

        $user->save([
            'username' => $username,
            'password' => sha1($password),
            'created_at' => time(),
            'updated_at' => time()
        ]);

        return $this->reponseOk();
    }
}