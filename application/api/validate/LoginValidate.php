<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/23
 * Time: 16:51
 */

namespace app\api\validate;


class LoginValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isNotEmpty',
        'password' => 'require|isNotEmpty',
    ];

    protected $message  =   [
        'username.require' => '20003',
        'password.require'     => '20002',
    ];

}