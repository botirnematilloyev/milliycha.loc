<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\MakeCompany $model */
/** @var TYPE_NAME $users */

$this->title = 'Create Make Company';
$this->params['breadcrumbs'][] = ['label' => 'Make Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="make-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=$this->render('_form', [
        'model' => $model,
        'users' => $users
    ]) ?>

</div>
