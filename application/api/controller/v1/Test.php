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
use think\Request;

class Test extends Base
{
   public function test()
   {
       dump(cache(input('token')));
   }
}