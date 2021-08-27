<?php

namespace nurielmeni\multiselect;

use nurielmeni\multiselect\assets\MultiSelectAsset;

/**
 * This is just an example.
 */
class MultiSelectWidget extends \yii\base\Widget
{
    public $model;
    public $attribute = '';
    public $label = '';
    public $rtl = true;
    public $showSelected = true;
    public $maxOptionsShow = 2;
    public $options = [];

    private function getAttributeInputId() {
        $modelClass = get_class($this->model);
        $exploded = explode('\\', $modelClass);
        return strtolower(end($exploded) . '-' . $this->attribute);
    }
    
    private function getAttributeInputName() {
        $modelClass = get_class($this->model);
        $exploded = explode('\\', $modelClass);
        return end($exploded) . '[' . $this->attribute . ']';
    }

    public function init()
    {
        parent::init();
        MultiSelectAsset::register(\Yii::$app->view);

        $this->options = is_array($this->options) ? $this->options : [];
    }

    public function run()
    {
        return $this->render('multiSelect', [
            'model' => $this->model,
            'attributeInputId' => $this->getAttributeInputId(),
            'attributeInputName' => $this->getAttributeInputName(),
            'label' => $this->label,
            'rtl' => $this->rtl,
            'showSelected' => $this->showSelected,
            'maxOptionsShow' => $this->maxOptionsShow,
            'options' => $this->options,
        ]);
    }
}
