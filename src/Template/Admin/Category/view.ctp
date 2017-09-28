<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="list-inline">
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->idCategory]) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="category view large-9 medium-8 columns content">
  <h3><?= h($category->Title) ?></h3>
  <hr>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdCategory') ?></th>
            <td><?= ($category->idCategory) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($category->Description) ?></td>
        </tr>
    </table>
</div>
