<div class="orderItem view large-9 medium-8 columns content">
    <h3><?= h($orderItem->product->Name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($orderItem->price, $currency ,['locale' => 'it_IT'])?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Total') ?></th>
            <td><?= $this->Number->currency($orderItem->sub_total, $currency ,['locale' => 'it_IT'])?></td>
        </tr>
    </table>
    <hr>
    <h3>Product information</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= $orderItem->product->Name ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= $orderItem->product->Description ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $orderItem->product->Size ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $orderItem->product->Weight ?> KG</td>
        </tr>
    </table>
</div>
