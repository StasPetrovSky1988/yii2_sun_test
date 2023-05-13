<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    public function actionIndex($category_id = null)
    {
        $categories = Category::find()->all();
        $query = Product::find();

        if ($category_id) $query->where(['category_id' => $category_id]);

        $products = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function actionAddproduct()
    {
        $model = new Product();
        $categories = Category::find()->asArray()->all();
        $categories = ArrayHelper::map($categories, 'id', 'name');

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            Yii::$app->session->addFlash('success' ,'Запись добавлена.');
            return $this->refresh();
        }

        return $this->render('addproduct', ['model' => $model, 'categories' => $categories]);
    }

    public function actionApi()
    {
        return $this->render('api');
    }

    public function actionResult()
    {
        $query = "select cat.name, (sum(oi.quantity) / (select sum(quantity) from order_item) * 100) summary
                  from category cat
                      inner join product p on cat.id = p.category_id
                      inner join order_item oi on p.id = oi.product_id
                  group by cat.id ";

        $summary = ArrayHelper::map(Yii::$app->db->createCommand($query)->queryAll(), 'name', 'summary');

        return $this->render('result', ['summary' => $summary]);
    }
}
