<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/23
 * Time: 16:40
 */

namespace app\api\controller\v1;


use app\api\model\User as UserModel;
use app\api\validate\AddressGet;
use app\api\service\Token;
use app\lib\exception\SuccessMessage;

class Address
{
    public function createOrUpdateAddress()
    {
        // 验证传过来的参数
        $validate = new AddressGet();
        $validate->goCheck();

        // 获取Uid
        $uid = Token::getCurrentUid();

        // 获取用户传的数据
        $dataArr = $validate->getDataByRule();

        // 查询该uid对应的address
        $user = UserModel::find($uid);
        $address = $user->address;
        if($address) {
            $address->save();
        } else {
            $user->address()->save($dataArr);
        }
        return new SuccessMessage();
    }
}