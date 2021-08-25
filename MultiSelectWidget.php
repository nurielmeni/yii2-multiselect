<?php

namespace nurielmeni\multiselect;

use nurielmeni\multiselect\assets\MultiSelectAsset;

/**
 * This is just an example.
 */
class MultiSelectWidget extends \yii\base\Widget
{
    public $name = '';
    public $rtl = true;
    public $label = '';

    public function init()
    {
        parent::init();
        MultiSelectAsset::register(\Yii::$app->view);

        $this->name = empty($this->name) ? 'm-ms-' . rand(0, 100) : $this->name;
    }

    public function run()
    {
        return $this->render('multiSelect', [
            'text' => "Hellow from multi select",
            'name' => $this->name,
            'rtl' => $this->rtl,
        ]);
    }
}
