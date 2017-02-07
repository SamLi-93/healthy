<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 2016/9/30
 * Time: 14:34
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch*/
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box widget_tableDiv">
    <div id="filter_show" class="widget-body">
        <div class="widget-main">
            <?php $form = ActiveForm::begin([
                'action' => ['order/index'],
                'method' => 'post',
                'fieldConfig' => [
                    'template' => "<div class='form-group' style='float: left;width:150px;'>{input}</div>",
                    'labelOptions' => ['style' => 'width:60px;'],
                ],
            ]);
            ?>
<!--            --><?php //if (!empty($query['QjOrder'])) {
//                $model->order_no = $query['QjOrder']['order_no'];
//                $model->customer_name = $query['QjOrder']['customer_name'];
//                $model->saler_name = $query['QjOrder']['saler_name'];
//                $model->order_price = $query['QjOrder']['order_price'];
//                $model->order_status = $query['QjOrder']['order_status'];
//                $model->order_status = $query['QjOrder']['order_status'];
//            }?>

            <?= $form->field($model, 'order_datetime_str')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => '选择日期',],
//                'value' => strtotime(date('yyyy-mm-dd')),
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,

                    'format' => 'yyyy-mm-dd ' ,
                ]
            ]); ?>
            <?= $form->field($model, 'order_no')->input('text',['placeholder' => '订单编号']) ?>
            <?= $form->field($model, 'customer_id')->widget(Select2::classname(), ['data' =>$customer_list , 'options' => ['placeholder' => '客户名'], ]); ?>
            <?= $form->field($model, 'saler_id')->widget(Select2::classname(), ['data' =>$customer_list , 'options' => ['placeholder' => '代理人'], ]); ?>
            <?= $form->field($model, 'order_status')->widget(Select2::classname(), ['data' =>['1' => '全部','2' => '已完成',
                '3' => '待送检','4' => '已送检','5' => '检测中','6' => '已完成'] , 'options' => ['placeholder' => '请选择状态'], ]); ?>

            <table style="width: 100%;">
                <tr>
                    <td>
                        <div class="form-group">
                            <?= Html::submitButton("查询", ["class" => "btn btn-primary btn-sm"]) ?>
                            <?= Html::a("重置", ['index'], ["class" => "btn btn-primary btn-sm"]) ?>
                        </div>
                    </td>
                </tr>
            </table>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
