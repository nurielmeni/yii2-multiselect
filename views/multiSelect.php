<?php

use yii\bootstrap4\Dropdown;

$firstOption = reset($options);
?>

<div class="m-multiselect-wrapper" data-el-id="<?= $attributeInputId ?>" dir="<?= $rtl ? 'rtl' : 'ltr' ?>">
  <input id="<?= $attributeInputId ?>" name="<?= $attributeInputName ?>" type="hidden" value="" />
  <p class="m-multiselect-button">
    <button id="<?= $attributeInputId ?>-button" class="btn toggle" type="button" data-toggle="collapse" data-target="#<?= $attributeInputId ?>-collapse" aria-expanded="false" aria-controls="<?= $attributeInputId ?>-collapse" aria-labelledby="<?= $attributeInputId ?>-label <?= $attributeInputId ?>-hint">
      <span id="<?= $attributeInputId ?>-label"><?= $label ?></span>
      <span id="<?= $attributeInputId ?>-hint"></span>
      <span class="material-icons m-icon">expand_more</span>
    </button>
  </p>
  <div id="<?= $attributeInputId ?>-collapse" class="collapse">
    <div class="card-body">
      <ul id="<?= $attributeInputId ?>-options" class="m-multiselect-options" role="listbox" aria-labelledby="<?= $attributeInputId ?>-label">
        <?php foreach($options as $key => $option) : ?>
          <li role="option" aria-selected="false" value="<?= $key ?>" tabindex='<?= $firstOption === $option ? 0 : -1 ?>'><?= $option ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="card-footer action">
      <button class="btn select-all" type="button"><span class="material-icons">check</span>בחר הכל</button>
      <button class="btn remove-all" type="button"><span class="material-icons">close</span>הסר הכל</button>
    </div>

  </div>
</div>

<?php 

$js = <<<JS
  MMultiSelect.init({
    maxOptionsShow: $maxOptionsShow,
    showSelected: $showSelected
  });
JS;

$this->registerJs($js, yii\web\View::POS_READY);