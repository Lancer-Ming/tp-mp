<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/8/23
 * Time: 21:27
 */

namespace app\api\validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = ['id' => 'require|isPositiveInteger'];

    protected $message = ['id' => 'id必须是正整数'];
}