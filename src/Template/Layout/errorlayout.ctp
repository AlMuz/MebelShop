<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->fetch('content') ?>

</body>
</html>


<style media="screen">
.error {
margin: 0 auto;
text-align: center;
}

.error-code {
bottom: 60%;
color: #2d353c;
font-size: 96px;
line-height: 100px;
}

.error-desc {
font-size: 12px;
color: #647788;
}

.m-b-10 {
margin-bottom: 10px!important;
}

.m-b-20 {
margin-bottom: 20px!important;
}

.m-t-20 {
margin-top: 20px!important;
}

</style>
