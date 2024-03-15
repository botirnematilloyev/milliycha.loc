<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property int $id
 * @property string $title
 * @property float $longitude
 * @property float $latitude
 */
class MakeCompany extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'longitude', 'latitude'], 'required'],
            [['longitude', 'latitude'], 'number'],
            [['title'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
        ];
    }
    public function getRestaurants()
    {
        return $this->hasMany(MakeCompany::class, ['manager_id' => 'id']);
    }
}
