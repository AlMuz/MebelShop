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
              echo $this->Form->control('Size',['class' => 'form-control']);
              echo $this->Form->control('Weight',['class' => 'form-control']);
              echo $this->Form->control('Category_idCategory', ['options' => $category,'label'=>'Category','class' => 'form-control']);
              echo $this->Form->control('Material_idMaterial', ['options' => $material,'label'=>'Material','class' => 'form-control']);

          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success margintop10']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
