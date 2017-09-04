<div class="category view large-9 medium-8 columns content">

    <div>
      <h1><?= h($category->Title).' - kategorija' ?></h1> 
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($category->Title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($category->Description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdCategory') ?></th>
            <td><?= $this->Number->format($category->idCategory) ?></td>
        </tr>
    </table>
</div>
