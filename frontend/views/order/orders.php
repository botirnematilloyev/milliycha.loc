<?php
use common\models\Meal;
use yii\helpers\Html;
use common\models\OrderItem;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\MakeCompany;
/** @var TYPE_NAME $model */
/** @var TYPE_NAME $buyurtma */
?>
<h1 class="text-center">Korzinka</h1>
<table class="table table-warning">
    <thead>
        <tr>
            <td>№</td>
            <td>Mahsulot nomi</td>
            <td>Mahsulot soni</td>
            <td><b>Jami</b> <?=Html::a('Yana+', ['order-meal/menu'], ['class' => 'btn btn-success']);?></td>
            <td><b>O'chirish</b></td>
        </tr>
    </thead>
    <?php
    foreach ($model as $key=>$order) {
        echo "
            <tr>
                <td>".($key+1)."</td>
                <td>".Meal::findOne($order->meal_id)->name."</td>
                <td>".$order->count."</td>
                <td>".$order->total_sum."</td>
                <td>".Html::a('X', ['delete', 'id' => $order->id], [
                                            'class' => 'btn btn-danger',
                                        'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post']])."
                </td>
            </tr>
        ";
    }
    ?>
</table>
<div class="alert alert-primary py-3" role="alert">
    <b>Jami xarid summasi: </b> <?= OrderItem::find()->where(['user_id' => Yii::$app->user->id,'status'=>\common\models\OrderStatus::PRE])->sum('total_sum') ?> so`m
</div>
<div class="bg-warning py-3 px-3">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($buyurtma, 'type')->dropDownList([ 'deliver' => 'Deliver', 'collect' => 'Collect'])->label('Yetkazuv turi')?>
    <?= $form->field($buyurtma, 'restaurant_id')
            ->dropDownList(
                ArrayHelper::map(MakeCompany::find()->asArray()->all(), 'id', 'title')
            ) ?>
    <div class="float-right"><?= \yii\helpers\Html::submitButton('Buyurtma berish', ['class' => 'btn btn-success']) ?></div>
    <?php ActiveForm::end(); ?>
</div>