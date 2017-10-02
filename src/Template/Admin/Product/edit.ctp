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
                ['action' => 'delete', $product->idProduct],
                ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="product form large-9 medium-8 columns content">
    <?= $this->Form->create($product,[ 'id'=>'productadd','enctype' => 'multipart/form-data']) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Edit Product') ?></legend>
          <?php
              echo $this->Form->control('Name',['class' => 'form-control']);
              echo $this->Form->control('Price',['class' => 'form-control']);
              echo $this->Form->control('Description',['class' => 'form-control']);
              echo $this->Form->control('Interest',['class' => 'form-control']);
              // echo $this->Form->input('MainImage', array('label' => __('Add main image'),'type' => 'file'));
              echo $this->Form->control('Material',['class' => 'form-control']);
              echo $this->Form->control('Size',['class' => 'form-control']);
              echo $this->Form->control('Weight',['class' => 'form-control']);
              echo $this->Form->control('Category_idCategory', ['options' => $category,'label'=>'Category','class' => 'form-control']);

          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style' => 'margin-top: 10px;']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
