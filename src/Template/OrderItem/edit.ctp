<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderItem->idOrder_item],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->idOrder_item)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Order Item'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderItem form large-9 medium-8 columns content">
    <?= $this->Form->create($orderItem) ?>
    <fieldset>
        <legend><?= __('Edit Order Item') ?></legend>
        <?php
            echo $this->Form->control('orders_idOrder');
            echo $this->Form->control('idProduct');
            echo $this->Form->control('quantity');
            echo $this->Form->control('price');
            echo $this->Form->control('sub_total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
