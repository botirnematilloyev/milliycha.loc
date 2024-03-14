<?php

namespace frontend\controllers;

use Yii;
use common\models\Meal;
use common\models\MealCategory;
use common\models\OrderItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderMealController extends Controller
{
    /**
     * Deletes an existing MealAdd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['orders']);
    }

    /**
     * Finds the MealAdd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Meal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderItem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionMenu()
    {
        $query = MealCategory::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'name' => SORT_ASC,
                ]
            ],
        ]);
        return $this->render('food', [
            'dataProvider' => $provider,
        ]);
    }

    public function actionMenuList($id)
    {
        $query = Meal::find()->where(['meal_category_id'=>$id])->all();
        $title = MealCategory::findOne($id);
        return $this->render('products',['data'=>$query,'title'=>$title->name]);
    }

    public function actionSingleProduct($id)
    {
        $product = Meal::findOne($id);
        if ($product === null) {
            throw new \yii\web\NotFoundHttpException('Product not found.');
        }
        $model = new OrderItem();
        if ($this->request->isPost && $model->load($this->request->post())) {
                $model->cost = $product->cost;
                $model->meal_id = $id;
                if(!isset($model->count) || $model->count==0){
                    $model->count = 1;
                }
                $model->total_sum = ($product->cost*$model->count);
                $model->user_id = Yii::$app->user->id;
                if($model->save()) {
                    return $this->redirect(['orders']);
                }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('single-product', ['product' => $product]);
    }
    public function actionOrders()
    {
        $model = OrderItem::find()->where(['user_id'=>Yii::$app->user->id])->all();
        return $this->render('orders',['model'=>$model]);
    }

    public function actionSendOrder($id)
    {

    }
}