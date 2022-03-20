<!DOCTYPE html>
<html>
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('schedule.css') ?>
    <?= $this->Html->css('base.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
  </head>
  <body>
    <header class="mb-3">
      <?= $this->element('common/header'); ?>
    </header>
    <div class="w-75 mx-auto">
      <?= $this->fetch('content') ?>
    </div>
  </body>
</html>