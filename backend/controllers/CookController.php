<?php
namespace backend\controllers;
use common\models\MakeCompany;
use common\models\Order;
use common\models\OrderItem;
use common\models\OrderStatus;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

class CookController extends Controller
{
    public function actionIndex()
    {
        $id = MakeCompany::find()->where(['manager_id'=>\Yii::$app->user->identity->id])->one()->id;
        $company_name = MakeCompany::findOne($id)->title;
        $orders = Order::find()->where(['restaurant_id'=>$id])->all();
        return $this->render('orders',['orders'=>$orders,'company_name'=>$company_name]);
    }

    public function actionShowOrders($id)
    {
        $customer_orders = OrderItem::find()->where([
            'user_id' => $id,
            'status' => OrderStatus::NEW,
        ])->all();
        var_dump($customer_orders);
        return $this->render('show-orders',['orders'=>$customer_orders]);
    }
}