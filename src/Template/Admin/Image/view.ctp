<div class="image view large-9 medium-8 columns content">
    <h3><?= h($image->idImage) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($image->Image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdImage') ?></th>
            <td><?= $this->Number->format($image->idImage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product IdProduct') ?></th>
            <td><?= $this->Number->format($image->Product_idProduct) ?></td>
        </tr>
    </table>
</div>
