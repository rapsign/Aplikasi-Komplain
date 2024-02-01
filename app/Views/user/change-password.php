<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Password</li>
  </ol>
</nav>

<div class="container">
<?php if(session()->getFlashdata('pesan')) :?>
    <div class="alert alert-success" role="alert">
   <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<?php if(session()->getFlashdata('gagal')) :?>
    <div class="alert alert-danger" role="alert">
   <?= session()->getFlashdata('gagal'); ?>
</div>
<?php endif; ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header text-center font-weight-bold">
      <p class="h5 mt-3 ">Ubah Password</p>
  </div>
  <div class="card-body">
  <form action ="<?= base_url('user/change');?>/<?=user()->id;?>" method="post">
  <div class="mb-3">
  <label for="pass1" class="form-label">Password Lama</label>
  <input type="password" class="form-control <?= ($validation->hasError('current_password')) ? 'is-invalid' : '' ;?>" id="pass1" name="current_password">
  <div class="invalid-feedback">
    <?= ($validation->getError('current_password'));?>
    </div>
</div>
<div class="mb-3">
  <label for="pass2" class="form-label">Password Baru</label>
  <input type="password" class="form-control <?= ($validation->hasError('new_password1')) ? 'is-invalid' : '' ;?>" id="pass2" name="new_password1">
  <div class="invalid-feedback">
    <?= ($validation->getError('new_password1'));?>
    </div>
</div>
<div class="mb-5">
  <label for="pass3" class="form-label ">Ulangi Password</label>
  <input type="password" class="form-control <?= ($validation->hasError('new_password2')) ? 'is-invalid' : '' ;?>" id="pass3" name="new_password2">
  <div class="invalid-feedback">
    <?= ($validation->getError('new_password2'));?>
    </div>
</div>
<button type="submit" class="btn btn-success mt-3 btn-user btn-block">Ubah Password</button>

</form>
  </div>
</div>

</div>

<?= $this->endSection(); ?>