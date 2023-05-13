<?php

namespace console\controllers;

use common\models\Category;
use yii\console\Controller;
use yii\helpers\BaseConsole;

/**
 * Консольный контроллер для управления категориями в базе данных
 */
class CategoryController extends Controller
{
    /**
     * Добавить категорию
     */
    public function actionCreate($name) {
        $category = new Category();
        $category->name = $name;

        if ($category->save()) {
            $message = $this->ansiFormat('Добавлена категория ' . $name, BaseConsole::FG_GREEN);
        } else {
            $message = 'Ошибка добавления категории. ';
            if ($category->hasErrors('name')) $message .= $category->getFirstError('name');

            $message = $this->ansiFormat($message, BaseConsole::FG_RED) ;
        }

        echo $message . "\n";
    }
}