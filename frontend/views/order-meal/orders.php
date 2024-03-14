<?php
use common\models\Meal;
use yii\helpers\Html;
use common\models\OrderItem;
/** @var TYPE_NAME $model */
?>
<h1 class="text-center">Korzinka</h1>
<table class="table table-warning">
    <thead>
        <tr>
            <td>№</td>
            <td>Mahsulot nomi</td>
            <td>Mahsulot soni</td>
            <td>Mahsulot narxi</td>
            <td><b>Jami</b> <?=Html::a('Yana+', ['/site/food'], ['class' => 'btn btn-success']);?></td>
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
                <td>".$order->cost."</td>
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
    <b>Jami xarid summasi: </b> <?=OrderItem::find()->where(['user_id'=>Yii::$app->user->id])->sum('total_sum')?> so`m
    <div class="float-right"><?=Html::a('Buyurtma berish',['send-order','id'=>Yii::$app->user->id],['class'=>'btn btn-success'])?></div>
</div>