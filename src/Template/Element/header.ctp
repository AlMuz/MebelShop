<header>
  <!-- if user not logged in, will be affix navbar with jumbotron above -->
  <?php if(!$loggedIn) : ?>
    <div class="jumbotron">
      <div class="container text-center">
        <h1>MuzInterior</h1>
        <p>Online interior store for all baltic states!</p>
      </div>
    </div>
    <nav class="navbar navbar-inverse"  data-spy="affix" data-offset-top="197">
  <!--Otherwise there will be fixed top navbar -->
  <?php else: ?>
    <nav class="navbar navbar-default navbar-fixed-top">
  <?php endif; ?>
  <?= $this->Flash->render(); ?>

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">MuzInterior</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Categories') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header"><?= __('Select Category') ?></li>
                        <li role="separator" class="divider"></li>
                        <!-- this part show 10 categories -->
                        <?php foreach ($cat as $category): ?>
                          <?php $id = $category->idCategory; ?>
                          <li>
                            <a href='/category/view/<?=$id ?>'><?= $category->Title ?></a>
                          </li>
                        <?php endforeach; ?>
                        <li role="separator" class="divider"></li>
                        <li><a href="/category/"><?= __('All categories') ?></a></li>
                    </ul>
                </li>
                <!--search field  -->
                <li>
                  <?= $this->Form->create('Product', ['type' => 'GET', 'url' => ['controller' => 'product', 'action' => 'search','id' => 'searchform']]); ?>
                  <?= $this->Form->input('search',['class' => 'form-control input-form','id' => 'searchInput','placeholder' => 'Search','label'=>false, 'autocomplete' => 'off']);  ?>
                  <?= $this->Form->end();  ?>
                </li>
            </ul >
            <ul class="nav navbar-nav navbar-right">
              <!--If user is admin - will be this button, otherwise it wont  -->
              <?php if($adminIn) : ?>
                <?= $this->Html->css('foradmin.css') ?>
                <li>
                  <a href="/admin"><?= __('Admin') ?></a>
                </li>
              <?php endif; ?>
              <!--If user is logged in - will be shopping cart and profile stuff  -->
              <?php if($loggedIn) : ?>
                <?= $this->Html->css('loggedin.css') ?>

                <li>
        	      	<?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart <span class="badge" id="cart-counter">'.$count.'</span>',
        	      								array('controller'=>'cart','action'=>'index'),array('escape'=>false));
                  ?>
        	      </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('User Section') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="/user/"><?= __('Profile') ?></a>
                      </li>
                      <li>
                        <a href="/orders"><?= __('Orders') ?></a>
                      </li>
                        <li role="separator" class="divider"></li>
                      <li>
                        <a href="/user/logout"><?= __('Logout') ?></a>
                      </li>
                    </ul>
                </li>
              <?php else :   ?>
                <!--Else there will be dropdown with sign in and register  -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Sign in') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li>
                          <a href='/user/login'><?= __('Sign in') ?></a>
                      </li>
                      <li>
                          <a href='/user/register'><?= __('Register') ?></a>
                      </li>
                    </ul>
                </li>
              <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
</header>
