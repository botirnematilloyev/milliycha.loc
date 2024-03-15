<?php

namespace common\models;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $ordered_time
 * @property string|null $order_status
 * @property int|null $total_price
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['type', 'string'],
            [['total_price','order_status','restaurant_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'ordered_time' => 'Ordered Time',
            'order_status' => 'Order Status',
            'total_price' => 'Total Price',
        ];
    }
}
