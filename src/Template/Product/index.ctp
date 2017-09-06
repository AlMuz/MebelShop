<?php $this->assign('title', 'Galvena lapa - '.$maintitle);?>
<div class="row">
	<?php foreach ($product as $product):?>
	<div class="col-sm-6 col-md-4 mainproduct">

			<?= $this->Html->link($this->Html->image($product->MainImage),
					array('action'=>'view',$product->idProduct),
					array('escape'=>false,'class'=>'thumbnail'));?>
			<div class="caption">
				<h4>
					<?= $this->Html->link(($product->Name),
    					array('action'=>'view',$product->idProduct));?>
				</h4>
			</div>
			<div>
					Price:
					<?= $product->Price;?>
			</div>
	</div>
	<?php endforeach;?>
</div>

<div class="paginator">
		<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
