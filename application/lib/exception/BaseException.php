<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/24
 * Time: 21:46
 */

namespace app\lib\exception;




use app\lib\Error;
use Exception;

class BaseException extends Exception
{
    /** HTTP 状态码
     * @var string
     */
    public $code = '400';

    /** 自定义错误码
     * @var string
     */
    public $errorCode = '10000';

    /** 错误信息
     * @var string
     */
    public $msg = '参数错误';

    public function __construct($params=[])
    {
        if ( ! is_array($params)) {
            $this->errorCode = $params;
            $this->msg = Error::getMsg($params);
            return;
        }
        // 如果传了 code
        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }

        // 如果传了 errorCode
        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }

        // 如果传了 msg
        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }
    }
}