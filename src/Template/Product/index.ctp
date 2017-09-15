<?php $this->assign('title', 'Products - '.$maintitle);?>
<?php if (!empty($product)): ?>
	<div class="">
		<!-- will be some carousel-->
	</div>
	<div class="row">
		<div>
			<table>
				<tbody>
					<tr>
						<td style="padding-right: 10px; padding-top:5px"><?= $this->Paginator->limitControl([15=>15, 30 => 30, 45 => 45] ); ?></td>
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
		</div>
		<?php foreach ($product as $product):?>
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
			<!-- <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p> -->
	</div>
<?php else: ?>
	<p>nav products</p>
<?php endif; ?>
