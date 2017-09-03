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
                ['action' => 'delete', $cart->idCart],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cart->idCart)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cart'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cart form large-9 medium-8 columns content">
    <?= $this->Form->create($cart) ?>
    <fieldset>
        <legend><?= __('Edit Cart') ?></legend>
        <?php
            echo $this->Form->control('FullPrice');
            echo $this->Form->control('Quantity');
            echo $this->Form->control('Product_idProduct');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
