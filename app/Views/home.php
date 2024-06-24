<?= $this->include('layouts/header'); ?>

<div class="container-fluid">
    <h1>Welcome, <?= $session->get('user_nama'); ?>!</h1>
    <p>di program Sistem Monitoring Parkir, by PPA.</p>   
</div>

<?= $this->include('layouts/footer') ?>