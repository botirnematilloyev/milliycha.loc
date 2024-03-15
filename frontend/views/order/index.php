<?php

use common\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <?= Html::img(Yii::getAlias('@frontend/web/images/car-deliver.svg')) ?>
        <h1 class="display-5">Sizning buyurtmalaringiz</h1>
        <div class="order-index">
            <?php $data = $dataProvider->getModels();
                echo "<table class='table table-info'>";
                echo "<thead><tr style='font-weight: bold'><td>Zakaz turi</td><td>Zakaz statusi</td><td>Yetkazuvchi filial</td><td>Buyurtma vaqti</td><td>Jami summa</td></tr></thead>";
                    foreach ($data as $datum) {
                        echo "
                            <tr>
                                <td>".$datum->type."</td>
                                <td>".$datum->order_status."</td>
                                <td>".\common\models\MakeCompany::findOne($datum->restaurant_id)->title."</td>
                                <td>".$datum->ordered_time."</td>
                                <td>".$datum->total_price."</td>
                            </tr>";
                    }
                echo "</table>";
            ?>
        </div>

        <p>
            <?= Html::a('Buyurtma berish', ['order-meal/menu'], ['class' => "btn btn-lg btn-warning"]) ?>
        </p>
    </div>
</div>