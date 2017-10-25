<?php $this->assign('title', 'All categories - '.$maintitle);?>

<div class="category index large-9 medium-8 columns content">
  <h3><?= __('All categories') ?></h3>
  <?php foreach ($category as $category): ?>
    <?= $this->Html->link(__($category->Title), ['action' => 'view', $category->idCategory]) ?>
    <?= ' - '. $category->Description ?>
    </br>
  <?php endforeach; ?>
  <?= $this->element('paginator') ?>
</div>
