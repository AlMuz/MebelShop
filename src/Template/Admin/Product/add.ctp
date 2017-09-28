<div class="product form large-9 medium-8 columns content">
  <!-- <ul >
      <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
  </ul> -->
    <?= $this->Form->create($product,[ 'id'=>'productadd','enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Price');
            echo $this->Form->control('Description');
            echo $this->Form->control('Interest');
            echo $this->Form->input('MainImage', ['label' => 'Add main image','type' => 'file']);
            echo $this->Form->control('Material');
            echo $this->Form->control('Size');
            echo $this->Form->control('Category_idCategory', ['options' => $category,'label'=>'Category']);
            // debug($category);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="/js/validation.js"></script>
