
<!DOCTYPE html>
<html lang="en">
  <head>
      <?= $this->Html->charset() ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
          <?= $this->fetch('title') ?>
      </title>
      <?= $this->Html->meta('icon') ?>
      <?= $this->Html->css('bootstrap.min.css') ?>
      <?= $this->Html->css('local.css') ?>
      <?= $this->Html->css('message.css') ?>
      <?= $this->Html->script('functions'); ?>

      <script src="/js/jquery.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>

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
                      <li><a href="/admin">Main</a></li>
                      <li><a href="admin/user">Users</a></li>
                      <li><a href="admin/product">Product</a></li>
                      <li><a href="admin/category">Category</a></li>
                      <li><a href="admin/image">Images</a></li>




                  </ul>
                  <ul class="nav navbar-nav navbar-right navbar-user">

                      <li class="dropdown user-dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b class="caret"></b></a>
                         <ul class="dropdown-menu">
                             <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                             <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                             <li class="divider"></li>
                             <li><a href="/user/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                         </ul>
                     </li>
                  </ul>
              </div>
          </nav>

          <div id="page-wrapper">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content') ?>
              <!-- content  -->
          </div>
          <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
  </body>
</html>
