<?php $this->assign('title', $product->Name.' - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li>
				<a href='/Category/view/<?=$product->Category_idCategory ?>'><?= $product->Category_idCategory?></a>
			</li>
			<li class="active">
				<?= $product->Name;?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-sm-3 col-md-6 mainproduct">
		<?=$this->Html->image($product->MainImage,array('escape'=>false,'class'=>'thumbnail','style'=>'height:280px; width:370px;'));?>
		<?php foreach ($product->image as $image):?>
			<?=$this->Html->image($image->Image,array('escape'=>false,'class'=>'thumbnail','style'=>'height:140px; width:185px;'));?>
		<?php endforeach;?>
	</div>

	<div class="col-sm-6 col-md-6 mainproduct">
		<h1>
			<?= $product->Name;?>
		</h1>
		<h2>
      Description:
      <?= $product->Description;?>
    </br></br>
			Price:
			<?= $product->Price;?> &euro;
		</h2>
		<p>
			<?= $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'carts','action'=>'add')));?>
			<?= $this->Form->hidden('product_id',array('value'=>$product->idProduct))?>
			<?= $this->Form->submit('Add to cart',array('class'=>'btn-success btn btn-lg'));?>
			<?= $this->Form->end();?>
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
