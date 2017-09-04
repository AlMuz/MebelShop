<?php $this->assign('title', 'Galvena lapa - '.$maintitle);?>

<div class="row">
	<?php foreach ($product as $product):?>
	<div class="col-sm-6 col-md-4">
		<div class="">
			<?= $this->Html->link($this->Html->image($product->MainImage),
					array('action'=>'view',$product->idProduct),
					array('escape'=>false,'class'=>'thumbnail'));?>
			<div class="caption">
				<h5>
					<?= $this->Html->link(($product->Name),
    					array('action'=>'view',$product->idProduct));?>
				</h5>
				<h5>
          MiniDescription
          <?= $product->MiniDescription;?>
          <br>
					Price:
					<?= $product->Price;?>
				</h5>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>
