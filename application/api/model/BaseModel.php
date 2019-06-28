<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/20
 * Time: 14:48
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model
{
    /**
     * @param $value 需要改变的原始url值
     * @param $data 整个模型返回的数组
     * @return string
     */
    protected function handleImgUrl($value, $data)
    {
        $finalUrl = $value;
        if ($data['from'] == '1') {
            $finalUrl = config('setting.imgPrefix').$value;
        }
        return $finalUrl;
    }
}