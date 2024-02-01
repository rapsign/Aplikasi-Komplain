<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Komplain</li>
  </ol>
</nav>
<div class="container"> 
<?php if(session()->getFlashdata('pesan')) :?>
    <div class="alert alert-success" role="alert">
   <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header text-center ">
  <p class="h5 mt-3 font-weight-bold">Komplain Masyarakat</p>
  </div>
  <div class="card-body  table-responsive ">
    <a href="<?= base_url('admin/export')?>" class="btn btn-success mb-3"><i class="fa fa-print" aria-hidden="true">&nbsp; Print</i></a>
  <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th scope="col">Pengirim</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($p as $file) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $file->email; ?></td>
                            <td><?= $file->subject; ?></td>
                            <td><?= $file->created_at; ?></td>
                            <td><a href="<?= base_url('admin/print/'. $file->id);?>" class="btn btn-success"> <i class="fa fa-eye" aria-hidden="true">&nbsp;Lihat</i></a></td>
                            </tr>
                    <?php endforeach;?>
                    
                    </tbody>
            </table>
            
</div>
  </div>
</div>
<?= $this->endSection(); ?>