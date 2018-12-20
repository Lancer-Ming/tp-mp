<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/24
 * Time: 21:47
 */

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\Request;

class ExceptionHandle extends Handle
{
    /** 状态码
     * @var
     */
    private $code;

    /** 自定义错误码
     * @var
     */
    private $errorCode;

    /** 错误信息
     * @var
     */
    private $msg;

    /** 重写 Handle 方法里的Render
     * @param Exception $e
     * @return \think\response\Json
     */
    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            //如果是自定义异常，则控制http状态码，不需要记录日志
            //因为这些通常是因为客户端传递参数错误或者是用户请求造成的异常
            //不应当记录日志

            $this->msg = $e->msg;
            $this->code = $e->code;
            $this->errorCode = $e->errorCode;
        } else {
            // 如果是服务器未处理的异常，将http状态码设置为500，并记录日志
            if (config('app_debug')) {
                // 调试状态下需要显示TP默认的异常页面，因为TP的默认页面
                // 很容易看出问题
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = '服务器内部错误，不想告诉你';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        }

        $request = Request::instance();

        $result = [
            'msg' => $this->msg,
            'errorCode' => $this->errorCode,
            'request_url' => $request->url()
        ];
        return json($result, $this->code);
    }

    /** 错误日志处理
     *  这里把config里日志配置的type改为test
     * @param Exception $e
     */
    private function recordErrorLog(Exception $e)
    {
        // 开启日志
        Log::init([
            'type'  =>  'File',
            'path'  =>  LOG_PATH,
            'level' => ['error']
        ]);

        // 日志记录方法
        Log::record($e->getMessage(),'error');
    }
}