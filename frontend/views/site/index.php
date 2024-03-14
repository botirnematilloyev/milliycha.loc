<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <?= Html::img(Yii::getAlias('@frontend/web/images/car-deliver.svg')) ?>
        <h1 class="display-4"><b>MILLIYCHA</b> ilovamizga xush kelibsiz !!!</h1>

        <p class="lead">Bu ilova orqali restaranimizdan turli taomlarni buyurtma qilishingiz mumkin.</p>

        <p><a class="btn btn-lg btn-warning" href="http://www.yiiframework.com">Buyurtma berish</a></p>
    </div>
</div>
