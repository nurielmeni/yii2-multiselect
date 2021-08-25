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
        <li role="option" aria-selected="false" value="1" tabindex='-1'>first</li>
        <li role="option" aria-selected="false" value="2" tabindex='-1'>secound</li>
        <li role="option" aria-selected="false" value="3" tabindex='-1'>third</li>
      </ul>
    </div>
    <div class="card-footer action">
      <button class="btn select-all" type="button"><span class="material-icons">check</span>בחר הכל</button>
      <button class="btn remove-all" type="button"><span class="material-icons">close</span>הסר הכל</button>
    </div>

  </div>
</div>