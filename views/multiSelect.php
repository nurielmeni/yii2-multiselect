<?php

use yii\bootstrap4\Dropdown;
?>

<div class="m-multiselect-wrapper" dir="<?= $rtl ? 'rtl' : 'ltr' ?>">
  <input id="<?= $name ?>" name="<?= $name ?>" type="hidden" value="[]" />
  <p class="m-multiselect-button">
    <button id="<?= $name ?>-button" class="btn btn-primary toggle" type="button" data-toggle="collapse" data-target="#<?= $name ?>-collapse" aria-expanded="false" aria-controls="<?= $name ?>-collapse" aria-labelledby="<?= $name ?>-label <?= $name ?>-hint">
      <span id="<?= $name ?>-label"><?= $label ?></span>
      <span id="<?= $name ?>-hint"></span>
      <span class="material-icons m-icon" role="aria-img">expand_more</span>
    </button>
  </p>
  <div id="<?= $name ?>-collapse" class="collapse">
    <div class="card card-body">
      <ul id="<?= $name ?>-options" class="m-multiselect-options" role="listbox" aria-labelledby="<?= $name ?>-label">
        <li role="option" aria-selected="false" value="1">first</li>
        <li role="option" aria-selected="false" value="2">secound</li>
        <li role="option" aria-selected="false" value="3">third</li>
      </ul>
    </div>
  </div>
</div>