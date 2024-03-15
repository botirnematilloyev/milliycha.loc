<?php
/** @var TYPE_NAME $company_name */
/** @var TYPE_NAME $orders */
?>
<h1><?=$company_name?></h1>
<?= "
<table class='table table-info'> 
    <thead>
        <tr style='font-weight: bold'>
            <td>Yetkazib berish</td>
            <td>Status</td>
            <td>Buyurtma qilingan vaqti</td>
            <td>Umumiy summa</td>
        </tr>
    </thead>
    <tbody>"?>
<?php
foreach ($orders as $order) {
    echo "<tr>
            <td>".$order->type."</td>
            <td>".$order->order_status."</td>
            <td>".$order->ordered_time."</td>
            <td>".$order->total_price."</td>
        </tr>";
}?>

<?="
    </tbody>
</table>
"?>