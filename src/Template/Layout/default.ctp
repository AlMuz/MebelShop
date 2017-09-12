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
    <?= $this->Html->css('message.css') ?>

    <?= $this->Html->css('css.css') ?>
    <?= $this->Html->css('menu.css') ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<header>
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">MuzFurniture</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Categories') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header"><?= __('Select Category') ?></li>
                            <li role="separator" class="divider"></li>
                            <?php foreach ($cat as $category): ?>
                              <?php $id = $category->idCategory; ?>
                              <li>
                                <a href='/Category/view/<?=$id ?>'><?= $category->Title ?></a>
                              </li>
                            <?php endforeach; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="/category/"><?= __('All categories') ?></a></li>
                        </ul>
                    </li>
                    <li><a href="/static/about"><?= __('About us') ?></a></li>
                </ul >


                <ul class="nav navbar-nav navbar-right">
                  <?php if($adminIn) : ?>
                    <li>
                      <a href="/admin"><?= __('Admin') ?></a>
                    </li>
                  <?php endif; ?>
                  <li>
          	      	<?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <span class="badge" id="cart-counter">'.'</span>',
          	      								array('controller'=>'cart','action'=>'view'),array('escape'=>false));?>
          	      </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('User Section') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <?php if($loggedIn) : ?>
                            <li>
                              <a href="/user/logout"><?= __('Logout') ?></a>
                            </li>
                          <?php else :   ?>
                            <li>
                                <a href='/user/login'><?= __('Login') ?></a>
                            </li>
                            <li>
                                <a href='/user/register'><?= __('Register') ?></a>
                            </li>
                          <?php endif; ?>
                        </ul>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
</header>

<div class="container-fluid text-center maincont">
    <div class="row content">
        <aside class="col-sm-2 sidenav hidden-xs">

            <div class="hide">

            </div>
        </aside>
        <main class="col-sm-8 leftpos">

          <?= $this->Flash->render(); ?>
          <?= $this->fetch('content') ?>
        </main>
        <aside class="col-sm-2 sidenav hidden-xs">
            <div class="hide">

            </div>
        </aside>
    </div>
</div>
    <footer>
      <br>
      <br>
      <br>
      <br>
    </footer>
  </div>
  <script src="/js/bootstrap.min.js"></script>
</body>
</html>
