<?php

namespace app\api\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `Api` module
 * Чтобы сортировать по цене: ?sort=-price
 * Чтобы выбрать по категории: ?filter[category_id]=1
 * Чтобы группировать по категории: ?filter[category_id][in][]=1&filter[category_id][in][]=2
 */
class ProductController extends ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ]
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }

    public $modelClass = '\common\models\Product';
}
