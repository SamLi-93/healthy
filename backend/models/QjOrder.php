<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qj_order".
 *
 * @property integer $id
 * @property integer $order_no
 * @property integer $order_status
 * @property integer $belong_lab
 * @property integer $saler_id
 * @property integer $order_price
 * @property integer $order_datetime
 * @property string $order_items
 * @property integer $customer_id
 * @property integer $pay_datetime
 * @property integer $deliver_datetime
 * @property integer $received_datetime
 * @property integer $detection_datetime
 * @property integer $complete_datetime
 * @property integer $is_delete
 */
class QjOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qj_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_no', 'order_status', 'belong_lab', 'saler_id', 'order_price', 'order_datetime', 'order_items', 'customer_id', 'is_delete'], 'required'],
            [['order_no', 'order_status', 'belong_lab', 'saler_id', 'order_price', 'order_datetime', 'customer_id', 'pay_datetime', 'deliver_datetime', 'received_datetime', 'detection_datetime', 'complete_datetime', 'is_delete'], 'integer'],
            [['order_items'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_no' => 'Order No',
            'order_status' => 'Order Status',
            'belong_lab' => 'Belong Lab',
            'saler_id' => 'Saler ID',
            'order_price' => 'Order Price',
            'order_datetime' => 'Order Datetime',
            'order_items' => 'Order Items',
            'customer_id' => 'Customer ID',
            'pay_datetime' => 'Pay Datetime',
            'deliver_datetime' => 'Deliver Datetime',
            'received_datetime' => 'Received Datetime',
            'detection_datetime' => 'Detection Datetime',
            'complete_datetime' => 'Complete Datetime',
            'is_delete' => 'Is Delete',
        ];
    }
}
