<?php

namespace common\models;
use Yii;
/**
 * This is the model class for table "meal".
 *
 * @property int $id
 * @property string $name
 * @property string $ingredients
 * @property float $cost
 * @property int $meal_category_id
 *
 * @property Restaurant $restaurant
 */
class Meal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'meal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ingredients', 'cost', 'meal_category_id'], 'required'],
            [['ingredients'], 'string'],
            [['cost'], 'number'],
            [['meal_category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ingredients' => 'Ingredients',
            'cost' => 'Cost',
            'meal_category_id' => 'Meal Category ID',
        ];
    }
}
