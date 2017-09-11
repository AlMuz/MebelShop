<?php $this->assign('title', 'All categories - '.$maintitle);?>

<div class="category index large-9 medium-8 columns content">
    <h3><?= __('All categories') ?></h3>
    <?php foreach ($category as $category): ?>
      <?= $this->Html->link(__($category->Title), ['action' => 'view', $category->idCategory]) ?>
      <?php echo ' - '. $category->Description ?>
      </br>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
