<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-inline">
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->idProduct]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= $product->Name ?></h3>
    <hr>
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
            <th scope="row"><?= __('Category title') ?></th>
            <td><?= $this->Html->link(__($product->category->Title), ['controller'=>'category','action' => 'view',$product->category->idCategory]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Description') ?></th>
            <td><?= $product->category->Description ?></td>
        </tr>
    </table>
      <div class="row">
          <h4><?= __('Description') ?></h4>
          <?= $this->Text->autoParagraph(h($product->Description)); ?>
      </div>
      <br>
      <!-- <?= debug($product); ?> -->
      <?= $this->Html->link(__('Add new photos'), ['controller'=>'image','action' => 'add'], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
      <br>
      <div style="display:inline;" class="">
    		<?php foreach ($product->image as $image):?>
          <?php if(!empty($image)): ?>
    			<?=$this->Html->image($image->Image,array('escape'=>false,'class'=>'thumbnail','style'=>'height:140px; width:185px;display: inline;'));?>
        <?php else: ?>
          <?= 'there are no galery' ?>
        <?php endif; ?>
    		<?php endforeach;?>
    	</div>
</div>

<style media="screen">
  td{
    padding-left: 20px;
  }
  th,td{
    /*border-bottom: 1px solid black;*/
  }
  th{
    /*border-right: 1px solid black;*/
    padding-right: 10px;
  }
</style>
