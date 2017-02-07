<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '订单列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="center subject_name">
    <span>订单列表</span>
</div>

<?php echo $this->render('_search', [
    'model' => $searchModel,
    'query' => $query,
    'customer_list' => $customer_list,
]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
//    'id' => "waitforcheck",
    'columns' => [
        ['class' => 'yii\grid\SerialColumn', 'header' => '序号'],

        [
            'header' => '订单编号',
            'attribute' => 'order_no',
            'value' => function ($model) {
                return $model['order_no'];
            }
        ],

        [
            'header' => '姓名',
            'attribute' => 'customer_name',
            'value' => function ($model) {
                return $model['customer_name'];
            }
        ],

        [
            'header' => '代理人',
            'attribute' => 'customer_name',
            'format' => 'raw',
            'value' => function ($model) {
                return $model['customer_name'];
            }
        ],

        [
            'header' => '订单金额',
            'attribute' => 'order_price',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model['order_price'] == null ){
                    return '';
                }
                return $model['order_price'];
            }
        ],

        [
            'header' => '订单状态',
            'attribute' => 'order_status',
            'format' => 'raw',
            'value' => function ($model) {
                if ($model['order_status'] == 1 ){
                    return '';
                } elseif ($model['order_status'] == 2) {
                    return '待付款';
                }elseif ($model['order_status'] == 3) {
                    return '待送检';
                }elseif ($model['order_status'] == 4) {
                    return '已送检';
                }elseif ($model['order_status'] == 5) {
                    return '检测中';
                }elseif ($model['order_status'] == 6) {
                    return '已完成';
                }
                return $model['order_status'];
            }
        ],

        ['class' => 'yii\grid\ActionColumn',
            'header' => '详细',
            'template' => '{edit}',
            'buttons' => [
                'edit' => function ($url, $model, $key) {
                    $options = [
                        'title' => '详细',
                        'class' =>'btn btn-success btn-sm',
                        'id' => 'edit-btn',
//                        'onclick' => 'return checkedit(' . $model['status'] . ',"' . $model['uploadname'] . '"' . ')',
                    ];
                    $url = Url::to(['order/detail','id'=>$model['id']]);
                    return Html::a('详细', $url, $options);
                },
            ],
        ],

    ],
]);
?>



