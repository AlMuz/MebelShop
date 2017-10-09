<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idOrder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('User_IdUser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Order_item_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Shipping') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Order_Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->idOrder) ?></td>
                <td><?= $order->has('user') ? $this->Html->link($order->user->idUser, ['controller' => 'User', 'action' => 'view', $order->user->idUser]) : '' ?></td>
                <td><?= $this->Number->format($order->Status) ?></td>
                <td><?= $this->Number->format($order->Weight) ?></td>
                <td><?= $this->Number->format($order->Order_item_count) ?></td>
                <td><?= $this->Number->format($order->Shipping) ?></td>
                <td><?= $this->Number->format($order->Total) ?></td>
                <td><?= $this->Number->format($order->Order_Type) ?></td>
                <td><?= h($order->Created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->idOrder]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->idOrder]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->idOrder], ['confirm' => __('Are you sure you want to delete # {0}?', $order->idOrder)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
