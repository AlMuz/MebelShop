<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Userinfo $userinfo
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Userinfo'), ['action' => 'edit', $userinfo->idUserInfo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Userinfo'), ['action' => 'delete', $userinfo->idUserInfo], ['confirm' => __('Are you sure you want to delete # {0}?', $userinfo->idUserInfo)]) ?> </li>
        <li><?= $this->Html->link(__('List Userinfo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Userinfo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userinfo view large-9 medium-8 columns content">
    <h3><?= h($userinfo->idUserInfo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($userinfo->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($userinfo->Surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($userinfo->City) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($userinfo->Adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IP') ?></th>
            <td><?= h($userinfo->IP) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdUserInfo') ?></th>
            <td><?= $this->Number->format($userinfo->idUserInfo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PhoneNumber') ?></th>
            <td><?= $this->Number->format($userinfo->PhoneNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($userinfo->Date) ?></td>
        </tr>
    </table>
</div>
