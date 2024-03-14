<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\MealCategory;

/** @var yii\web\View $this */
/** @var common\models\Meal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="meal-add-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meal_category_id')->dropDownList(
        ArrayHelper::map(MealCategory::find()->all(),'id','name'),
        ['prompt'=>'Select category']
    )->label('Meal category') ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ingredients')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
