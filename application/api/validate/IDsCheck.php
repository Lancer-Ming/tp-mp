<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/20
 * Time: 15:13
 */

namespace app\api\validate;


class IDsCheck extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|IDsCheck'
    ];

    protected $message = [
        'ids' => 'ids必须是以逗号分隔的字符串'
    ];

    public function IDsCheck($value)
    {
        $ids = explode(',', $value);
        if (empty($ids)) {
            return false;
        }
        foreach($ids as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        }
        return true;
    }

}