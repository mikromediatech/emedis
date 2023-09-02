<?php $this->extend('Theme/modern/page_layout'); ?>
<?= $this->section('css') ?>
<style>
  .contoh{ 
     color:blue;
  }
</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<p class="contoh">ini adalah contoh </p>
<?= $this->endSection() ?>


<?= $this->section('jsscript') ?>

 
<?= $this->endSection() ?>

