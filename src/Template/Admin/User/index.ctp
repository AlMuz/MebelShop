<div class="users index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Users') ?></h3>
    <table class="table table-responsive table-condensed table-striped">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('idUser') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Login') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Password') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Surname') ?></th>
              <th scope="col"><?= ('Phonenumber') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
              <th scope="col"><?= ('Root') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $user): ?>
            <tr>
              <td><?= $this->Number->format($user->idUser) ?></td>
              <td><?= h($user->Login) ?></td>
              <td>Secret</td>
              <td><?= h($user->Email) ?></td>
              <td><?= h($user->Name) ?></td>
              <td><?= h($user->Surname) ?></td>
              <td><?= h($user->Phonenumber) ?></td>
              <td><?= h($user->Date) ?></td>
              <td><?= $this->Number->format($user->Root) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view',$user->idUser], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $user->idUser], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
