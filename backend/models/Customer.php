<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $realname
 * @property integer $sex
 * @property integer $birthday
 * @property string $phone_num
 * @property string $address
 * @property integer $is_delete
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['realname', 'sex', 'birthday', 'phone_num', 'address', 'is_delete'], 'required'],
            [['sex', 'birthday', 'is_delete'], 'integer'],
            [['realname'], 'string', 'max' => 32],
            [['phone_num'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'realname' => 'Realname',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'phone_num' => 'Phone Num',
            'address' => 'Address',
            'is_delete' => 'Is Delete',
        ];
    }
}
