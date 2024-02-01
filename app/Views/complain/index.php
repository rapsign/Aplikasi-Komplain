<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kotak Pengaduan</li>
  </ol>
</nav>
<div class="container "> 
<?php if(session()->getFlashdata('pesan')) :?>
    <div class="alert alert-success" role="alert">
   <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header text-center font-weight-bold">
  <p class="h5 mt-3">Kotak Pengaduan</p>
  </div>
  <div class="card-body">
  <form action ="<?= base_url('/complain/savep');?>" method="post" enctype="multipart/form-data">
<?= csrf_field(); ?>
<div class="mb-3">
    <input type="hidden" class="form-control" id="email" name="email" value="<?= user()->email;?>">
</div>
  <div class="mb-3">
  <label for="judul" class="form-label">Kepada</label>
  <select class="form-control" id="kepada" name="kepada" autofocus required>
    <option selected>--Pilih--</option>
    <option value="Divisi Intelijen">Divisi Intelijen</option>
    <option value="Divisi Pidana Umum">Divisi Pidana Umum</option>
    <option value="Divisi Pidana Khusus">Divisi Pidana Khusus</option>
    <option value="Divisi Perdata dan Tata Usaha Negara">Divisi Perdata dan Tata Usaha Negara</option>
    <option value="Divisi Barang Bukti">Divisi Barang Bukti</option>
  </select>
</div>  
  <div class="mb-3">
  <label for="subject" class="form-label">Perihal</label>
    <input type="text" class="form-control" id="subject" name="subject" autofocus required>
</div>
<div class="mb-5">
  <label for="complain" class="form-label">Pengaduan</label>
  <textarea class="form-control" id="complain" rows="5" autofocus id="complain" name="complain" required></textarea>
</div>
<div class="mb-3">
    <input type="hidden" class="form-control" id="status" name="status" value="0">
</div>
<button type="submit" class="btn btn-success mt-3 btn-user btn-block">Kirim </button>         
</div>
  </div>
</div>
<?= $this->endSection(); ?>