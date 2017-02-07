<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $item_no
 * @property string $item_name
 * @property integer $lab_id
 * @property integer $order_status
 * @property integer $net_price
 * @property integer $sale_price
 * @property integer $create_time
 * @property integer $last_change_datetime
 * @property integer $active_datetime
 * @property string $item_detail
 * @property integer $is_delete
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_no', 'item_name', 'lab_id', 'order_status', 'net_price', 'sale_price', 'create_time', 'last_change_datetime', 'active_datetime', 'item_detail'], 'required'],
            [['item_no', 'lab_id', 'order_status', 'net_price', 'sale_price', 'create_time', 'last_change_datetime', 'active_datetime', 'is_delete'], 'integer'],
            [['item_name'], 'string', 'max' => 128],
            [['item_detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_no' => 'Item No',
            'item_name' => 'Item Name',
            'lab_id' => 'Lab ID',
            'order_status' => 'Order Status',
            'net_price' => 'Net Price',
            'sale_price' => 'Sale Price',
            'create_time' => 'Create Time',
            'last_change_datetime' => 'Last Change Datetime',
            'active_datetime' => 'Active Datetime',
            'item_detail' => 'Item Detail',
            'is_delete' => 'Is Delete',
        ];
    }
}
