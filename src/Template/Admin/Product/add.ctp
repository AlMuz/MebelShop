<div class="product form large-9 medium-8 columns content">
  <!-- <ul >
      <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?></li>
  </ul> -->
    <?= $this->Form->create($product,[ 'id'=>'productadd','enctype' => 'multipart/form-data']) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Add Product') ?></legend>
          <?php
              echo $this->Form->control('Name',['class' => 'form-control']);
              echo $this->Form->control('Price',['class' => 'form-control']);
              echo $this->Form->control('Description',['class' => 'form-control']);
              echo $this->Form->control('Interest',['class' => 'form-control']);
              echo $this->Form->input('MainImage', ['label' => 'Add main image','type' => 'file']);
              echo $this->Form->control('Material',['class' => 'form-control']);
              echo $this->Form->control('Size',['class' => 'form-control']);
              echo $this->Form->control('Category_idCategory', ['options' => $category,'label'=>'Category','class' => 'form-control']);
              // debug($category);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style' => 'margin-top: 10px;']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

<script src="/js/validation.js"></script>
