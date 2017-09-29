<?php if($this->request->query['search'] != null): ?>
  <div class="row">
    <h2 style="text-align:center;">
       Search request is: <b><?= $this->request->query['search'] ?> </b>
    </h2>
    <hr style="border-top:1px solid #040404;">
  </div>
<?php endif; ?>

<?php if(!empty($products)) : ?>
  <div class="row">
      <?php foreach ($products as $product): ?>
        <div class="col-sm-6 col-md-4 mainproduct">
  					<?= $this->Html->link($this->Html->image($product->MainImage),
  							array('action'=>'view',$product->idProduct),
  							array('escape'=>false,'class'=>'thumbnail'));?>
  					<div class="caption">
  						<h4>
  							<?= $this->Html->link(($product->Name),
  		    					array('action'=>'view',$product->idProduct));
  									if(($product->Interest) > 50 ){
  											echo '<p style="float: right;"><span style="color:red" class="glyphicon glyphicon-heart"></span> TOP!</p>';
  									}
  							?>
  						</h4>
  					</div>
  					<div>
  							Price:
  							<?= $this->Number->currency($product->Price, $currency);?>
  					</div>
  			</div>
      <?php endforeach; ?>
      <!-- <?php debug($products) ?> -->
  </div>
<?php else: ?>
  <h2 style="text-align:center;">No Results</h2>
  <hr style="border-top:1px solid #040404;">
  
<?php endif; ?>
