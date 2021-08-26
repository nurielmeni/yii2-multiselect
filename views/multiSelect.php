<?php

use yii\bootstrap4\Dropdown;
?>

<div class="m-multiselect-wrapper" data-el-id="<?= $name ?>" dir="<?= $rtl ? 'rtl' : 'ltr' ?>">
  <input id="<?= $name ?>" name="<?= $name ?>" type="hidden" value="[]" />
  <p class="m-multiselect-button">
    <button id="<?= $name ?>-button" class="btn toggle" type="button" data-toggle="collapse" data-target="#<?= $name ?>-collapse" aria-expanded="false" aria-controls="<?= $name ?>-collapse" aria-labelledby="<?= $name ?>-label <?= $name ?>-hint">
      <span id="<?= $name ?>-label"><?= $label ?></span>
      <span id="<?= $name ?>-hint"></span>
      <span class="material-icons m-icon">expand_more</span>
    </button>
  </p>
  <div id="<?= $name ?>-collapse" class="collapse">
    <div class="card-body">
      <ul id="<?= $name ?>-options" class="m-multiselect-options" role="listbox" aria-labelledby="<?= $name ?>-label">
        <?php foreach($options as $key => $option) : ?>
          <li role="option" aria-selected="false" value="<?= $key ?>" tabindex='-1'><?= $option ?></li>
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