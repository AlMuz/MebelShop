<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Userinfo[]|\Cake\Collection\CollectionInterface $userinfo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Userinfo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userinfo index large-9 medium-8 columns content">
    <h3><?= __('Userinfo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idUserInfo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PhoneNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('City') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('IP') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userinfo as $userinfo): ?>
            <tr>
                <td><?= $this->Number->format($userinfo->idUserInfo) ?></td>
                <td><?= h($userinfo->Name) ?></td>
                <td><?= h($userinfo->Surname) ?></td>
                <td><?= $this->Number->format($userinfo->PhoneNumber) ?></td>
                <td><?= h($userinfo->City) ?></td>
                <td><?= h($userinfo->Adress) ?></td>
                <td><?= h($userinfo->IP) ?></td>
                <td><?= h($userinfo->Date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userinfo->idUserInfo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userinfo->idUserInfo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userinfo->idUserInfo], ['confirm' => __('Are you sure you want to delete # {0}?', $userinfo->idUserInfo)]) ?>
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
