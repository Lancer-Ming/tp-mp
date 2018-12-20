<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/22
 * Time: 23:13
 */

namespace app\api\validate;

use think\Validate;

class testValidate extends Validate
{
    protected $rule = [
        'id' => 'require|max:6'
    ];
}