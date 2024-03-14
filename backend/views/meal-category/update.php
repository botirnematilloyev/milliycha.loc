<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MealCategory $model */

$this->title = 'Update Meal Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Meal Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meal-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
