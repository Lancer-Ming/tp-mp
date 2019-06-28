<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 15:33
 */

namespace app\api\service;

use app\api\model\User;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;


/**
 * 微信登录
 * 如果担心频繁被恶意调用，请限制ip
 * 以及访问频率
 */
class UserToken extends Token
{
    /** 预备缓存的数据值
     * @param $userModel
     * @return mixed
     */
    public static function prepareCachedValue($userModel)
    {
        $cacheValue = $userModel->toArray();
        return $cacheValue;
    }

    /**
     * 写入缓存并返回令牌
     * @param $cachedValue
     * @return string 令牌token
     * @throws TokenException
     */
    public static function saveToCache($cachedValue)
    {
        // 获取令牌
        $key = self::generateToken();
        // 缓存值
        $value = json_encode($cachedValue);
        // 缓存有效时间
        $expire_in = config('setting.token_expire_in');

        $result = cache($key, $value, $expire_in);
        if (!$result) {
            throw new TokenException('10001');
        }
        return $key;
    }

}