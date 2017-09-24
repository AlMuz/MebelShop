
<div class="users view large-9 medium-8 columns content">

        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->idUser]) ?>

    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
      <tr>
          <th scope="row"><?= __('Login') ?></th>
          <td><?= h($user->Login) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Password') ?></th>
          <td><?= h($user->Password) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Email') ?></th>
          <td><?= h($user->Email) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Name') ?></th>
          <td><?= h($user->Name) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Surname') ?></th>
          <td><?= h($user->Surname) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('IdUser') ?></th>
          <td><?= $this->Number->format($user->idUser) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Phonenumber') ?></th>
          <td><?= $this->Number->format($user->Phonenumber) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Root') ?></th>
          <td><?= $user->Root ? __('Yes') : __('No') ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Date') ?></th>
          <td><?= h($user->Date) ?></td>
      </tr>

    </table>
</div>
