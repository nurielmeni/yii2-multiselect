<?php

namespace nurielmeni\multiselect;

use nurielmeni\multiselect\assets\MultiSelectAsset;

/**
 * This is just an example.
 */
class MultiSelectWidget extends \yii\base\Widget
{
    public function init()
    {
        parent::init();
        MultiSelectAsset::register(\Yii::$app->view);
    }

    public function run()
    {
        return $this->render('multiSelect', [
            'text' => "Hellow from multi select",
        ]);
    }
}
