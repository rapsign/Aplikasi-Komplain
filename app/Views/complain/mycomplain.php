<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Komplain Saya</li>
  </ol>
</nav>
<div class="container"> 
<?php if(session()->getFlashdata('pesan')) :?>
    <div class="alert alert-success" role="alert">
   <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header text-center font-weight-bold">
  <p class="h5 mt-3">Komplain Saya</p>
  </div>
  <div class="card-body  table-responsive ">
  <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Tanggal Dan Jam</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($p as $file) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $file->subject; ?></td>
                            <td><?= $file->created_at; ?></td>
                            <td><span class="badge badge-<?= ($file->status == '0')? 'warning' : 'success' ?>"><?= ($file->status == '0')? '<i class="fa fa-spinner" aria-hidden="true"></i> &nbsp Diproses ' : '<i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp Diterima' ?></span></td>
                            </tr>
                    <?php endforeach;?>
                    
                    </tbody>
            </table>
            
</div>
  </div>
</div>
<?= $this->endSection(); ?>