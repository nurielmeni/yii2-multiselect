<?php

namespace nurielmeni\multiselect;

use nurielmeni\multiselect\assets\MultiSelectAsset;

/**
 * This is just an example.
 */
class MultiSelectWidget extends \yii\base\Widget
{
    public $name = '';
    public $label = '';
    public $rtl = true;

    public function init()
    {
        parent::init();
        MultiSelectAsset::register(\Yii::$app->view);

        $this->name = empty($this->name) ? 'm-ms-' . rand(0, 100) : $this->name;
    }

    public function run()
    {
        return $this->render('multiSelect', [
            'name' => $this->name,
            'label' => $this->label,
            'rtl' => $this->rtl,
        ]);
    }
}
