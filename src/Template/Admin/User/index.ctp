<div class="users index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Users') ?></h3>
    <table class="table table-responsive table-condensed table-striped">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('idUser','User ID') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Login') ?></th>
              <th scope="col"><?= ('Password') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Surname') ?></th>
              <th scope="col"><?= ('Phonenumber') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Country') ?></th>
              <th scope="col"><?= $this->Paginator->sort('City') ?></th>
              <th scope="col"><?= ('Adress') ?></th>
              <th scope="col"><?= ('Created') ?></th>
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
              <td><?= h($user->Country) ?></td>
              <td><?= h($user->City) ?></td>
              <td><?= h($user->Adress) ?></td>
              <td><?= date("Y-m-d H:i:s", strtotime($user->Created)) ?></td>
              <td><?= h($user->Root) ? __('Yes') : __('No') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view',$user->idUser], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
                    <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $user->idUser], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
