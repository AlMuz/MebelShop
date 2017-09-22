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
<?= $this->Html->css('search.css') ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?= $this->Html->script('jquery.min'); ?>
<!-- My functions -->
<?= $this->Html->script('functions'); ?>
<script src="/jv/jquery.validate.min.js"></script>
<script src="/jv/additional-methods.js"></script>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
