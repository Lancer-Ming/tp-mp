<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/23
 * Time: 21:46
 */

namespace app\api\validate;


use app\lib\Error;
use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * @return bool
     * @throws ParameterException
     */
    public function goCheck()
    {
        // 获取 http 传入参数
        $request = Request::instance(); // 获取实例
        $params = $request->param();

        $result = $this->check($params);
        if (!$result) {
            throw new ParameterException([
                'msg' => Error::getMsg($this->error),
                'errorCode' => $this->error
            ]);
        } else {
            return true;
        }
    }

    /**
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool|string
     */
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return $field . '不允许为空';
        } else {
            return true;
        }
    }

    public function getDataByRule($arrays)
    {
        if(array_key_exists('user_id', $arrays) || array_key_exists('uid', $arrays)) {
            throw new ParameterException([
                'msg' => '参数中包含有非法的参数名user_id或者uid'
            ]);
        }
        $newArr = [];
        foreach ($this->rule as $key => $rule) {
            $newArr[$key] = $arrays[$key];
        }
        return $newArr;
    }
}