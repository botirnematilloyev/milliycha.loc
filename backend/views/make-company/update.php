<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MakeCompany $model */

$this->title = 'Update Make Company: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Make Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="make-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
