<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
/** @var TYPE_NAME $data */
?>
<div class="text-center">
    <h1>
        <?= /** @var TYPE_NAME $title */
        $title?>
    </h1>
</div>
<table class="table table-info">
    <thead>
        <tr>
            <td>Ovqat nomi</td>
            <td>Ovqat mahsulotlari</td>
            <td>Ovqat narxi</td>
            <td>Ovqatni ko'rish</td>
        </tr>
    </thead>
    <?php
    foreach ($data as $datum) {
        echo "<tr>
                <td>$datum->name</td>
                <td>$datum->ingredients</td>
                <td>$datum->cost</td>
                <td>".Html::a('Ko`rish',['order/view','id'=>$datum->id],['class'=>'btn btn-primary'])."</td>
              <tr>";
    }
?>
</table>