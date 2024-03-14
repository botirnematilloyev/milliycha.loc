<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MealCategory $model */

$this->title = 'Create Meal Category';
$this->params['breadcrumbs'][] = ['label' => 'Meal Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
