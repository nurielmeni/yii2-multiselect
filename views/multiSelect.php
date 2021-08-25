<?php

use yii\bootstrap4\Dropdown;
?>

<div class="m-multiselect-wrapper" dir="<?= $rtl ? 'rtl' : 'ltr' ?>">
  <select id="<?= $name ?>" multiple name="<?= $name ?>[]">
    <option value="1">first</option>
    <option value="2">secound</option>
    <option value="3">third</option>
    <option value="4">forth</option>
  </select>
  <p>
    <label for="<?= $name ?>-options"><?= $label ?></label>
    <button id="<?= $name ?>-button" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#<?= $name ?>-collapse" aria-expanded="false" aria-controls="<?= $name ?>-collapse">
      <span class="selection-hint"></span>
      <span class="material-icons" role="aria-img">expand_more</span>

    </button>
  </p>
  <div id="<?= $name ?>-collapse" class="collapse">
    <div class="card card-body">
      <ul id="<?= $name ?>-options"  class="m-multiselect-options" role="listbox">
        <li role="option" aria-selected="false" value="1">first</li>
        <li role="option" aria-selected="false" value="2">secound</li>
        <li role="option" aria-selected="false" value="3">third</li>
      </ul>
    </div>
  </div>
</div>