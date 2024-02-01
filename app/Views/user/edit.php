<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
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
      <p class="h5 mt-3">Ubah Profile</p>
  </div>
  <div class="card-body">
  <form action ="<?= base_url('user/update');?>/<?=user()->id;?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="<?= user()->username;?>" readonly>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= user()->email;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fullname</label>
    <input type="text" name="fullname" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : '' ;?>"  value="<?= user()->fullname;?>">
  <div class="invalid-feedback">
    <?= ($validation->getError('fullname'));?>
    </div>
    </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">Image</label></div>
    <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-3">
    <img src="<?= base_url('/img/profile/' . user()->user_image); ?>" class="img-thumbnail">
    </div>
    <div class="col-sm-9">
    <input type="file" name="user_image" class="form-control <?= ($validation->hasError('user_image')) ? 'is-invalid' : '' ;?>">
    <div class="invalid-feedback">
    <?= ($validation->getError('user_image'));?>
    </div>
    </div>
    </div>
    </div>
  <button type="submit" class="btn btn-success mt-5 btn-user btn-block">Ubah</button>
</form>
  </div>
</div>

</div>

<?= $this->endSection(); ?>