<?php
namespace app\lib;


class Error {
   public static $error = [
       '10000' => '参数错误',
       '10001' => '服务器缓存异常',

       '20001' => '用户名或者密码错误',
       '20002' => '密码不能为空',
       '20003' => '用户名不能为空',
       '20004' => 'token已过期或者不存在，请重新登录'
   ];


    /** 通过errCode 获取错误信息
     * @param $errCode
     * @return mixed|string
     */
   public static function getMsg($errCode)
   {
       return self::$error[$errCode] ?? '';
   }
}