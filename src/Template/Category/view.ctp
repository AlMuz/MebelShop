<?php $this->assign('title', $category->Title.' - '.$maintitle); ?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?=$category->Title ?>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="padding-left">
	  <h1 class="page-header"><?= __('Category') . ': ' . h($category->Title) ?></h1>
	  <h2>Description: <?= h($category->Description) ?></h2>
	  <hr>
	</div>
	<div class="row">
    <table>
      <tbody>
        <tr>
          <td class="limitControl"><?= $this->Paginator->limitControl([15=>15, 30 => 30, 45 => 45] ); ?></td>
          <td>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                Sort <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                <li>
                  <?= $this->Paginator->sort('Interest', 'Popular products',['direction' => 'desc', 'lock' => true]); ?>
                </li>
                <li>
                  <?= $this->Paginator->sort('Price', 'Price asc',['direction' => 'asc', 'lock' => true]); ?>
                </li>
                <li>
                  <?= $this->Paginator->sort('Price', 'Price desc',['direction' => 'desc', 'lock' => true]); ?>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <?php if (!empty($product)): ?>
    	<?php foreach ($product as $product):?>
      	<div class="col-sm-6 col-md-4 mainproduct">
    			<?= $this->Html->link($this->Html->image($product->MainImage),
    					['controller'=>'product','action'=>'view',$product->idProduct],
    					['escape'=>false,'class'=>'thumbnail']);
          ?>
    			<div>
    				<h4>
              <?= $this->Html->link(($product->Name),
		    					['controller'=>'product','action'=>'view',$product->idProduct]);

									if(($product->Interest) > 50 ){
											echo '<p style="float: right;"><span class="glyphicon glyphicon-heart"></span> TOP!</p>';
									}
							?>
    				</h4>
    			</div>
    			<div>
  					Price:
            <?= $this->Number->currency($product->Price, $currency);?>
    			</div>
      	</div>
    	<?php endforeach;?>
    <?php endif; ?>
	</div>
  <?= $this->element('paginator') ?>
</div>
