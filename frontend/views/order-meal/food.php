<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use common\models\OrderItem;
?>
<h1 style="text-align: center">Taomlar menusi</h1>
<div class="row text-center">
<?php
/** @var TYPE_NAME $dataProvider */
$model = $dataProvider->getModels();
foreach ($model as $data){
    echo Html::a($data->name, ['/order-meal/menu-list/','id'=>$data->id],['class'=>'col-lg-3 btn btn-primary mx-2 my-2','style'=>'display:inline-block']);
}
?>
</div>
