<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/2/7
 * Time: 15:19
 */

namespace backend\modules\models;


class Customer extends \app\models\Customer
{
    public function getCustomerName()
    {
        $list = self::findBySql('SELECT id,realname FROM customer')->all();
        $customer_list = [];
        foreach ($list as $k => $v) {
            $key = $v['id'];
            $customer_list[$key] = $v['realname'] ;
        }
        return $customer_list;
    }
}