<?php $this->assign('title', 'Admin panel - '.$maintitle);?>
<!DOCTYPE html>
<html>
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('admin.css') ?>
    <?= $this->Html->css('message.css') ?>
    <?= $this->Html->script('functions'); ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/jv/jquery.validate.min.js"></script>
    <script src="/jv/additional-methods.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">To the shop</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="/admin">Main page</a></li>
            <li><a href="/admin/user">Users</a></li>
            <li><a href="/admin/product">Products</a></li>
            <li><a href="/admin/material">Material</a></li>
            <li><a href="/admin/category">Categories</a></li>
            <li><a href="/admin/image">Images</a></li>
          </ul>
        </div>
      </nav>
      <div id="page-wrapper">
        <?= $this->Flash->render(); ?>
        <?= $this->fetch('content') ?>
      </div>
    </div>
  </body>
</html>
