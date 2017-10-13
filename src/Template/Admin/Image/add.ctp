<div class="image form large-9 medium-8 columns content">
    <?= $this->Form->create($image,['enctype' => 'multipart/form-data']) ?>
    <div class="form-group">

    <fieldset>
        <legend><?= __('Add Image') ?></legend>
        <?php
          echo $this->Form->control('Image', ['label' => 'Add image','type' => 'file']);
          echo $this->Form->control('Product_idProduct', ['options' => $product,'label'=>'Product','class' => 'form-control','value'=>$value]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success margintop10']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
