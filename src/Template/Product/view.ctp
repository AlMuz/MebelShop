<?php $this->assign('title', $product->Name.' - '.$maintitle);?>
<!-- <?= $this->Html->css('prodview'); ?> -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb" style="margin-bottom: 10px">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li>
				<a href='/Category/view/<?=$product->Category_idCategory ?>'><?=$product->category->Title ?></a>
			</li>
			<li class="active">
				<?= $product->Name;?>
			</li>
		</ol>
	</div>
</div>

<div class="col-md-12" style="margin-bottom: 20px">
	<div class="col-sm-6 col-md-6">
		<?= $this->Html->image($product->MainImage,['class'=>'img-responsive', 'style' => 'max-height: 500px']);?>
	</div>

	<div class="col-sm-6 col-md-6 ">
		<h1 class="page-header">
			<b><?= $product->Name;?></b>
		</h1>
		<p>
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

		<div style=" padding-top: 10px;">
			<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Information</a></li>
		    <li><a data-toggle="tab" href="#menu1">Galery</a></li>
		  </ul>

		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
					<h2>Description</h2>
					<?= $product->Description;?>

					<h2>Size</h2>
					<?= $product->Size;?>

					<h2>Material</h2>
					<?= $product->Material;?>
		    </div>

		    <div id="menu1" class="tab-pane fade">
					<h3>Galery</h3>
					<div style="display:inline;">
						<?php if(!empty($product->image)): ?>
							<?php foreach ($product->image as $image):?>
								<?=$this->Html->image($image->Image,array('escape'=>false,'class'=>'thumbnail','style'=>'height:140px; width:185px;display: inline;'));?>
							<?php endforeach;?>
						<?php else: ?>
							<?= 'There are no photo in galery:(' ?>
						<?php endif; ?>
					</div>
		    </div>

		  </div>
		</div>
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
