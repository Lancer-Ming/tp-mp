<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/24
 * Time: 21:49
 */

namespace app\lib\exception;


class ProductMissException extends BaseException
{
    /** HTTP 状态码
     * @var string
     */
    public $code = '404';

    /** 自定义错误码
     * @var string
     */
    public $errorCode = '20000';

    /** 错误信息
     * @var string
     */
    public $msg = '指定的商品不存在';
}