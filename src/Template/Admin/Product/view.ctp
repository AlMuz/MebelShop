<div class="product view large-9 medium-8 columns content">
  <?= $this->Html->link(__('Edit product'), ['controller'=>'product','action' => 'edit', $product->idProduct], ['class' => 'btn btn-success pull-right']) ?>

    <h3><?= $product->Name ?></h3>
    <hr>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('MainImage') ?></th>
            <td><?= ($this->Html->image($product->MainImage,['class'=>'img-responsive', 'style' => 'max-height: 300px'])) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->Price, $currency,['locale' => 'it_IT']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interest') ?></th>
            <td><?= $product->Interest ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Material') ?></th>
            <td><?= h($product->material->Title) ?></td>
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
            <th scope="row"><?= __('Material title') ?></th>
            <td><?= ($product->material->Title) ?></td>
        </tr>
    </table>
      <div class="row">
          <h4><?= __('Description') ?></h4>
          <?= $this->Text->autoParagraph($product->Description); ?>
      </div>
      <br>
      <?= $this->Html->link(__('Add new photos'), ['controller'=>'image','action' => 'add'], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
      <br>
      <div style="display:inline;">
    		<?php foreach ($product->image as $image):?>
          <?php if(!empty($image)): ?>
    			<?=$this->Html->image($image->Image,['escape'=>false,'class'=>'thumbnail','style'=>'height:140px; width:185px;display: inline;']);?>
        <?php else: ?>
          <?= 'there are no gallery' ?>
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
