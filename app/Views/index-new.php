<?= $this->include('layouts/header') ?>
<?php 
    $session = \Config\Services::session();
?>
<div class="container-fluid default-dash">
    <h1>Welcome, <?= $session->get('user_nama'); ?>!</h1>
    <p>di program Sistem Monitoring Parkir, by PPA.</p>   
</div>
<?= $this->include('layouts/footer') ?>