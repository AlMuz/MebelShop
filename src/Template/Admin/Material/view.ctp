<div class="material view large-9 medium-8 columns content">
    <h3><?= h($material->Title).' - material' ?></h3>
    <hr>
    <div class="related">
        <h4><?= __('Related Product') ?></h4>
        <?php if (!empty($material->product)): ?>
          <table class="table table-responsive table-condensed table-striped">
              <thead>
                    <tr>
                        <th scope="col"><?= __('IdProduct') ?></th>
                        <th scope="col"><?= __('Name') ?></th>
                        <th scope="col"><?= __('Price') ?></th>
                        <th scope="col"><?= __('Description') ?></th>
                        <th scope="col"><?= __('Interest') ?></th>
                        <th scope="col"><?= __('Size') ?></th>
                        <th scope="col"><?= __('Weight') ?></th>
                        <th scope="col"><?= __('Main Image') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
              </thead>
              <tbody>
            <?php foreach ($material->product as $product): ?>
            <tr>
                <td><?= h($product->idProduct) ?></td>
                <td><?= h($product->Name) ?></td>
                <td><?= h($product->Price) ?></td>
                <td><?= h($product->Description) ?></td>
                <td><?= h($product->Interest) ?></td>
                <td><?= h($product->Size) ?></td>
                <td><?= h($product->Weight) ?></td>
                <td><?= ($this->Html->image($product->MainImage,['class'=>'img-responsive', 'style' => 'max-height: 200px'])) ?></td>

                <td class="actions">
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view',$product->idProduct], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $product->idProduct], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct),'class' => 'btn btn-xs btn-danger', 'escapeTitle' => false]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
