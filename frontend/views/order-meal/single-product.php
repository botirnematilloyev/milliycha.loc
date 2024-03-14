<?php
/** @var TYPE_NAME $product */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\OrderItem;

$url = Url::to(['order','id'=>$product->id,'name'=>$product->name,'cost'=>$product->cost]);
$model = new OrderItem();
?>
<div class='card' style='width: 18rem;'>
    <div class='card-body'>
        <h5 class='card-title'><?= $product->name ?></h5>
        <p class='card-text'><?= $product->ingredients ?></p>
        <?php $form = ActiveForm::begin(['id' => $product->id]); ?>
        <?= $form->field($model, 'count')->input('number', ['placeholder' => 'Soni','value'=>1])->label(false) ?>
        <?= Html::submitButton('Xarid qilish '.$product->cost, ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
