<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/21
 * Time: 15:35
 */

return [
    // 小程序app_id
    'app_id' => 'wx547b33829cfc6021',
    // 小程序app_secret
    'app_secret' => '989ff8bc5139630ccc5415ab952b104a',

    // 微信使用code换取用户openid及session_key的url地址
    'login_url' => "https://api.weixin.qq.com/sns/jscode2session?" .
        "appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
];