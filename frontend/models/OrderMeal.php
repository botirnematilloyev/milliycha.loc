<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $ordered_time
 * @property string|null $order_status
 * @property int|null $total_price
 */
class OrderMeal extends \yii\db\ActiveRecord
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
            [['type', 'order_status'], 'string'],
            [['ordered_time'], 'safe'],
            [['total_price'], 'integer'],
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
