<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 15:31
 */

namespace app\api\service;


use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    /** 生成token令牌
     * @return string
     */
    public static function generateToken()
    {
        $randChar = getRandChar(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_salt');
        return md5($randChar . $timestamp . $tokenSalt);
    }


    public static function getCurrentUid()
    {
        // 去获取缓存里的uid值
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    public static function getCurrentTokenVar($key)
    {
        // 获取客户端传来的token
        $request = Request::instance();
        $token = $request->header('token');
        // 根据token查到对应的储存值
        $vars = Cache::get($token);
        if (!$vars) {
            throw new TokenException();
        } else {
            if (!is_array($vars)) {
                $vars = json_decode($vars,true);
            }
            // 根据需要的key查到缓存对应的值
            if (array_key_exists($key, $vars)) {
                return $vars[$key];
            } else {
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }



    }
}