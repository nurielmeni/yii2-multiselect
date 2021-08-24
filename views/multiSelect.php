<?php

use yii\bootstrap4\Dropdown;
?>

<div class="m-multiselect-wrapper">
  <h2><?= $text ?></h2>
  <?= Dropdown::widget([
    'items' => [
      ['label' => 'DropdownA', 'url' => '/'],
      ['label' => 'DropdownB', 'url' => '#'],
    ],
  ]) ?>
</div>