<?= $this->Html->charset() ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
    <?= $this->fetch('title') ?>
</title>

<?= $this->Html->meta('description', ' Online store, which offers furniture, interior decors and gifts. In production process we try to use natural ingredients and materials'); ?>
<?= $this->Html->meta('icon') ?>

<!-- All required Style Sheets -->
<?= $this->Html->css('bootstrap.min.css') ?>
<?= $this->Html->css('message.css') ?>
<?= $this->Html->css('css.css') ?>
<?= $this->Html->css('menu.css') ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?= $this->Html->script('jquery.min'); ?>

<!-- My function -->
<?= $this->Html->script('functions'); ?>

<!-- Jquery validator with additional methods -->
<script src="/jv/jquery.validate.min.js"></script>
<script src="/jv/additional-methods.js"></script>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>
