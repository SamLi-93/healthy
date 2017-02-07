<?php

/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/2/7
 * Time: 13:24
 */

namespace backend\modules\models;

class QjOrder extends \app\models\QjOrder
{
    public $customer_name;
    public $saler_name;
    public $order_datetime_str;

    public function getCustomerName()
    {
        $sql = "select realname from customer where is_delete = 1 ";

    }

    public function getSalerName()
    {

    }

}