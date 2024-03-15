<?php
namespace backend\controllers;
use common\models\MakeCompany;
use common\models\Order;
use yii\web\Controller;

class CookController extends Controller
{
    public function actionIndex()
    {
        $id = MakeCompany::find()->where(['manager_id'=>\Yii::$app->user->identity->id])->one()->id;
        $company_name = MakeCompany::findOne($id)->title;
        $orders = Order::find()->where(['restaurant_id'=>$id])->all();
        return $this->render('orders',['orders'=>$orders,'company_name'=>$company_name]);
    }
}