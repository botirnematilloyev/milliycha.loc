<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\OrderMeal $model */

$this->title = 'Create Order Meal';
$this->params['breadcrumbs'][] = ['label' => 'Order Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-meal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
