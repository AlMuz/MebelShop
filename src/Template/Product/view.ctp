<?php $this->assign('title', $product->Name.' - '.$maintitle);
?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li><?= $this->Html->link('Home','/');?>
			</li>
			<li class="active"><?= $product->Name;?>
			</li>
		</ol>
	</div>
</div>

<div class="row ">
	<div class="col-lg-6 col-md-6">
		<?=$this->Html->image($product->MainImage,array('class'=>'thumbnail'));?>
	</div>

	<div class="col-lg-6 col-md-6">
		<h1>
			<?= $product->Name;?>
		</h1>
		<h2>
      Description:
      <?= $product->Description;?>
    </br></br>
			Price:
			<?= $product->Price;?>
		</h2>
		<p>
			<!-- <?= $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'carts','action'=>'add')));?>
			<?= $this->Form->hidden('product_id',array('value'=>$product['Product']['id']))?>
			<?= $this->Form->submit('Add to cart',array('class'=>'btn-success btn btn-lg'));?>
			<?= $this->Form->end();?> -->
		</p>
	</div>
</div>


<script>
$(document).ready(function(){
	$('#add-form').submit(function(e){
		e.preventDefault();
		var tis = $(this);
		$.post(tis.attr('action'),tis.serialize(),function(data){
			$('#cart-counter').text(data);
		});
	});
});
</script>
