<?php

namespace app\api\model;

use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use app\api\service\Token;
use app\api\service\UserToken;

class User extends BaseModel
{
    public function address()
    {
        return $this->hasOne('Address', 'user_id', 'id');
    }

    /** 登录验证
     * @param $params
     * @return string
     * @throws UserException
     * @throws \app\lib\exception\TokenException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function login($params)
    {
        $userModel = self::where(['username' => $params['username'], 'password' => sha1($params['password'])])->find();
        if (! $userModel) {
            throw new UserException('20001');
        }
        // 需要缓存的数据
        $userInfo = UserToken::prepareCachedValue($userModel);
        // 生成token 并写入缓存
        $token = UserToken::saveToCache($userInfo);
        return $token;
    }
}
