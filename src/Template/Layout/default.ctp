<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->element('head') ?>
  </head>
  <body>
    <?= $this->element('header') ?>
    <div class="container-fluid text-center maincont">
      <?= $this->element('leftsidenav') ?>
      <?= $this->element('main') ?>
      <?= $this->element('rightsidenav') ?>
    </div>

    <?= $this->element('footer') ?>

    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
