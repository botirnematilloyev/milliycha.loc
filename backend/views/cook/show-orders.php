<?php
use yii\grid\GridView;
/** @var TYPE_NAME $orders */

?>
<table>
    <?php
    foreach ($orders as $order) {
        echo "
            <tr>
                <td><?=$order->meal_id?></td>
                <td><?=$order->count?></td>
            </tr>";
    }
    ?>
</table>
