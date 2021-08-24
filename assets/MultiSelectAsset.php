<?php

namespace nurielmeni\multiselect\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MultiSelectAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => YII_DEBUG
    ];
    public $sourcePath = '@nurielmeni/multiselect/assets';
    public $css = [
        'css/multiSelect.css',
    ];
    public $js = [
        'js/multiSelect.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
