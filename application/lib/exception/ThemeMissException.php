<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/24
 * Time: 21:49
 */

namespace app\lib\exception;


class ThemeMissException extends BaseException
{
    /** HTTP 状态码
     * @var string
     */
    public $code = '404';

    /** 自定义错误码
     * @var string
     */
    public $errorCode = '30000';

    /** 错误信息
     * @var string
     */
    public $msg = '请求的theme不存在';
}