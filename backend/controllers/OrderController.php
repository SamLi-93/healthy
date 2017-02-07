<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2017/2/7
 * Time: 11:14
 */

namespace backend\controllers;


use backend\modules\models\Customer;
use backend\modules\models\QjOrder;
use Yii;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\grid\GridView;

class OrderController extends Controller
{

    private $customer_list = [];

    public function init()
    {
        parent::init();
        $customer = new Customer();
        $this->customer_list = $customer->getCustomerName();
    }

    public function actionTest()
    {
        echo strtotime(date('Y-m-d'));
        exit;
    }

    public function actionIndex()
    {
        $model = new QjOrder();

        $query = Yii::$app->request->post();
//        print_r($query['QjOrder']);exit;
        $sql_parms = '';
        if (!empty($query['QjOrder'])) {
            $query_parms = array_filter($query['QjOrder']);
            $sql_parms = 'where a.is_delete = 1 and a.customer_id = b.id ';
        }

//        print_r($query_parms);exit;

        if (isset($query_parms['order_time'])) {
            $sql_parms .= " and a.order_time = '" . $query_parms['order_time'] . "'";
        }

        if (isset($query_parms['order_no'])) {
            $sql_parms .= " and a.order_no = '" . $query_parms['order_no'] . "'";
        }

        if (isset($query_parms['customer_id'])) {
            $sql_parms .= " and a.customer_id = '" . $query_parms['customer_id'] . "'";
        }

        if (isset($query_parms['customer_id'])) {

            $sql_parms .= " and a.customer_id = '" . $query_parms['customer_id'] . "'";
        }

        if (isset($query_parms['order_status'])) {

            $sql_parms .= " and a.order_status = '" . $query_parms['order_status'] . "'";
        }

        $sql = "select a.*,b.realname as customer_name from qj_order as a, customer as b where a.is_delete = 1 and a.customer_id = b.id";

        $command = Yii::$app->db->createCommand('SELECT COUNT(*) from qj_order  ');

        $count = $command->queryScalar();

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 15,
            ],
            'sort' => [
                'attributes' => [
                    'id',
                ],
            ],
        ]);

        GridView::widget([
            'dataProvider' => $dataProvider,
        ]);

        return $this->render('index', [
            'searchModel' => $model,
            'dataProvider' => $dataProvider,
            'query' => $query,
            'customer_list' => $this->customer_list,
        ]);
    }

}