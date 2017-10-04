<div class="products index large-9 medium-8 columns content">
    <?= $this->Html->link(__('Add New'), ['action' => 'add'], ['class' => 'btn btn-success pull-right']) ?>
    <h3 class="page-header"><?= __('Images') ?></h3>
    <table class="table table-responsive table-condensed table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idImage') ?></th>
                <th scope="col"><?= ('Image') ?></th>
                <th scope="col"><?= ('Product_idProduct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($image as $image): ?>
            <tr>
                <td><?= $this->Number->format($image->idImage) ?></td>
                <td><?= $this->Html->image($image->Image,['class'=>'img-responsive', 'style' => 'max-height: 150px'])?></td>
                <td><?= $this->Html->link(__($image->product->Name), ['controller'=>'product','action' => 'view',$image->Product_idProduct]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view', $image->idImage], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $image->idImage], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->idImage], ['confirm' => __('Are you sure you want to delete # {0}?', $image->idImage),'class' => 'btn btn-xs btn-danger', 'escapeTitle' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>

</div>
