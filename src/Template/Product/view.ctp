<?php $this->assign('title', $product->Name.' - '.$maintitle);?>
<!-- <?= $this->Html->css('prodview'); ?> -->
<!-- <div class="row">
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
 -->

<div class="col-sm-6 col-md-6 mainproduct">
	<?= $this->Html->link($this->Html->image($product->MainImage),
			array('action'=>'view',$product->idProduct),
			array('escape'=>false,'class'=>'thumbnail'));?>

	<div style="display:inline;" class="">
		<?php foreach ($product->image as $image):?>
			<?=$this->Html->image($image->Image,array('escape'=>false,'class'=>'thumbnail','style'=>'height:140px; width:185px;display: inline;'));?>
		<?php endforeach;?>
	</div>

</div>

<div class="">
	<h1>
		<?= $product->Name;?>
	</h1>
	<p>
    Description:
    <?= $product->Description;?>
  </br></br>
		Price:
		<?= $this->Number->currency($product->Price, $currency);?>
	</p>
	<?php if($loggedIn) : ?>
		<?= $this->Form->create('Cart',array('id'=>'add-form','url'=>array('controller'=>'carts','action'=>'add')));?>
		<?= $this->Form->hidden('product_id',array('value'=>$product->idProduct))?>
		<?= $this->Form->submit('Add to cart',array('class'=>'btn-success btn'));?>
		<?= $this->Form->end();?>
	<?php else :   ?>
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#buy">Add to cart</button>
			<div id="buy" class="collapse out">
				<p style="font-size:16px;"><br>If you want to add product in cart, <br>please login</p>
				<?= $this->Html->link(
			    'Login',
			    '/user/login',
			    ['class' => 'btn btn-info']
					);
				?>
			</div>

		<?php endif; ?>
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
