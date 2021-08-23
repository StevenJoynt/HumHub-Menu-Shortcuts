<?php

namespace sij\humhub\modules\shortcuts\models;

use Yii;

class ConfigureForm extends \yii\base\Model
{

    public $json;

    public function rules()
    {
        return [
            [
                'json',
                'string',
            ]
        ];
    }

}
