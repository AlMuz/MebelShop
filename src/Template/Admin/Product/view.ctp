<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-inline">
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->idProduct]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= $product->Name ?></h3>
    <hr>
    <br>
    <table class="vertical-table">

        <tr>
            <th scope="row"><?= __('MainImage') ?></th>
            <td><?= ($this->Html->image($product->MainImage,['class'=>'img-responsive', 'style' => 'max-height: 300px'])) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->Price, $currency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest') ?></th>
            <td><?= $product->Interest ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= h($product->Material) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($product->Size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category IdCategory') ?></th>
            <td><?= $this->Number->format($product->Category_idCategory) ?></td>
        </tr>
    </table>
      <div class="row">
          <h4><?= __('Description') ?></h4>
          <?= $this->Text->autoParagraph(h($product->Description)); ?>
      </div>
</div>
