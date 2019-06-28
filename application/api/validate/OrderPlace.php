<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/31
 * Time: 16:38
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $rules = [
        'products' => 'checkProducts'
    ];

    protected $singerRules = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger',
    ];


    protected function checkProducts($values)
    {
        if (empty($values)) {
            throw new ParameterException([
                'msg' => '商品列表不能为空'
            ]);
        }

        if (!is_array($values)) {
            throw new ParameterException([
                'errorCode' => '10001',
                'msg' => '所传参数必须是数组格式'
            ]);
        }

        foreach ($values as $value) {
            $this->checkProduct($value);
        }

    }

    private function checkProduct($value)
    {
        $validate = new BaseValidate($this->singerRules);
        $result = $validate->check($value);
        if(!$result) {
            throw new ParameterException([
                'msg' => '商品列表参数错误'
            ]);
        }
    }

}