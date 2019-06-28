<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/25
 * Time: 14:35
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = '400';
    public $errorCode = '10000';
    public $msg = '参数错误';
}