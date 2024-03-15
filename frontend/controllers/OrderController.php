<?php

namespace frontend\controllers;

use Yii;
use common\models\Meal;
use common\models\Order;
use common\models\OrderItem;
use common\models\OrderStatus;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $card = new OrderItem();
        if ($this->request->isPost && $card->load($this->request->post())) {
            $card->meal_id = $id;
            $card->status = OrderStatus::PRE;
            if(!isset($card->count) || $card->count==0){
                $card->count = 1;
            }
            $card->total_sum = ($this->findFood($id)->cost*$card->count);
            $card->user_id = Yii::$app->user->id;
            if($card->save()) {
                return $this->redirect('card');
            }
        } else {
            $card->loadDefaultValues();
        }
        return $this->render('view', [
            'model' => $this->findFood($id),
            'card' => $card
        ]);
    }

    public function actionCard()
    {
        $model = OrderItem::find()->where(['user_id'=>Yii::$app->user->id,'status'=>OrderStatus::PRE])->all();
        $query = new Order();

        if ($this->request->isPost) {
            $query->load($this->request->post());
            if ($query->isNewRecord && $query->validate()) {
                $query->ordered_time = date('Y-m-d H:i:s', time());
                $query->order_status = OrderStatus::NEW;
                $query->total_price = OrderItem::find()->where(['user_id'=>Yii::$app->user->id,'status'=>-11])->sum('total_sum');

                if ($query->save()) {
                    Yii::$app->db->createCommand()
                        ->update('order_item', ['status' => OrderStatus::NEW], ['status' => OrderStatus::PRE])
                        ->execute();
                    return $this->redirect(['index']);
                }
                else{
                    echo "<pre>";
                    var_dump($query->getErrors());
                    echo "</pre>";
                }
            }
            else{
                var_dump($query->errors);
            }
        }

        return $this->render('orders', ['buyurtma' => $query, 'model' => $model]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Order();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findOrderItem($id)->delete();

        return $this->redirect(['card']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel()
    {
        if ($model = Order::find()->all()) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findOrderItem($id)
    {
        if (($model = OrderItem::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findFood($id)
    {
        if (($model = Meal::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
