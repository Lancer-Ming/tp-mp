<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 16:08
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'Token已过期或无效Token';
    public $errorCode = 10001;
}