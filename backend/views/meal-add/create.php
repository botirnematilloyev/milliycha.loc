<?php
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Meal $model */

$this->title = 'Create Meal Add';
$this->params['breadcrumbs'][] = ['label' => 'Meal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-add-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
