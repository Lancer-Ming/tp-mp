<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/23
 * Time: 16:51
 */

namespace app\api\validate;


class AddressGet extends BaseValidate
{
    protected $rule = [
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isNotEmpty',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty'
    ];
}