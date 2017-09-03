
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
    <?= $this->Html->css('css.css') ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="/js/bootstrap.min.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>
    <!--Navbar -->
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Select Category</li>
                            <li role="separator" class="divider"></li>
                            <?php foreach ($category as $category): ?>
                              <?php $id = $category->idCategory; ?>
                            <li><a href='/Category/view/'><?= $category->Title ?></a></li>
                            <?php endforeach; ?>
                            <li role="separator" class="divider"></li>
                            <li><a href="/category/">All categories</a></li>
                        </ul>

                    </li>
                    <li><a href="/about/">About us</a></li>

                </ul >
                <ul class="nav navbar-nav">
                    <li class="li-form-search">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                            </div><!-- /input-group -->
                        </div>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!---admin panel -->

                    <!---User panel -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User section<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->

        </div>
    </nav>
</header>

<div class="container-fluid text-center maincont">
    <div class="row content">
        <aside class="col-sm-2 sidenav hidden-xs">
            <div class="hide">
                <p>side left</p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
        </aside>
        <main class="col-sm-8 text-left centerinfo">
            <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <aside class="col-sm-2 sidenav hidden-xs">
            <div class="hide">
                <p>side right</p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
        </aside>
    </div>
</div>
    <footer>
    </footer>
</body>
</html>
