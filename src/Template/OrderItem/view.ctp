<div class="orderItem view large-9 medium-8 columns content">
    <h3><?= h($orderItem->idOrder_item) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdProduct') ?></th>
            <td><?= h($orderItem->Product_idProduct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOrder Item') ?></th>
            <td><?= $this->Number->format($orderItem->idOrder_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orders IdOrder') ?></th>
            <td><?= $this->Number->format($orderItem->orders_idOrder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($orderItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Total') ?></th>
            <td><?= $this->Number->format($orderItem->sub_total) ?></td>
        </tr>
    </table>
</div>
