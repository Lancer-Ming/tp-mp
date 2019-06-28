<?php
/**
 * Created by PhpStorm.
 * User: Lancer
 * Date: 2018/12/20
 * Time: 15:09
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ProductMissException;
use app\lib\exception\ThemeMissException;
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

    /** 获取某个分类下的所有商品
     * @param int $id
     * @return mixed
     * @throws ThemeMissException
     */
    public function getAllInCategory($id = -1)
    {
        (new IDMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id);
        if ($products->isEmpty()) {
            throw new ThemeMissException();
        }
        $data = $products->hidden(['summary'])->toArray();
        return $data;
    }


    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if(!$product) {
            throw new ProductMissException();
        }
        return $product;
    }



}