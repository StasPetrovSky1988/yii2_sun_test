<?php

namespace common\models;

use yii\base\Model;

class AddProductForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }
}