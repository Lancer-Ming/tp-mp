<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/31
 * Time: 16:36
 */

namespace app\api\controller\v1;


use app\api\validate\OrderPlace;
use app\api\service\Token as TokenService;
use app\api\service\Order as OrderService;

class Order
{
    /**
     *  下单
     */
    public function placeOrder()
    {
        (new OrderPlace())->goCheck();
        // 获取前端传过来的products参数
        $products = input('post.products/a');
        // 获取UId
        $uid = TokenService::getCurrentUid();
        $order = new OrderService();
        $status = $order->place($uid, $products);

    }
}