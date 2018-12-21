<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/20
 * Time: 15:09
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\lib\exception\ProductMissException;
use think\Controller;
use app\api\model\Product as ProductModel;

class Product extends Controller
{
    public function getRecent($count=15)
    {
        (new Count())->goCheck();

        $products = ProductModel::getRecent($count);

        if ($products->isEmpty()) {
            throw new ProductMissException();
        }
        // 单独过滤隐藏掉summary
        $products->hidden(['summary']);
        return json($products);
    }

}