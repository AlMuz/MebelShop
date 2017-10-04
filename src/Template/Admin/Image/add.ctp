<div class="image form large-9 medium-8 columns content">
    <?= $this->Form->create($image) ?>
    <div class="form-group">

    <fieldset>
        <legend><?= __('Add Image') ?></legend>
        <?php
            echo $this->Form->control('Image', ['type'=>'file','label'=>'Image']);
            echo $this->Form->control('Product_idProduct', ['options' => $product,'label'=>'Product','class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
