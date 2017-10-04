<?php $this->assign('title', 'Main Page - '.$maintitle);?>
<?php if (!empty($product)): ?>
	<div class="">
		<!-- will be some carousel-->
	</div>
	<div class="row">
		<div style="padding-left:15px;">
			<table>
				<tbody>
					<tr>
						<td style="padding: 5px 10px 0 5px;"><?= $this->Paginator->limitControl([15=>15, 30 => 30, 45 => 45] ); ?></td>
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
			<!-- it print product with their style  -->
			<?= $this->element('product') ?>
	</div>
	<?= $this->element('paginator') ?>


<?php endif; ?>
