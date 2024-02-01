<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">Complain Box</li>
  </ol>
</nav>

<div class="container"> 
<?= view('Myth\Auth\Views\_message_block') ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header">
  <div class="row">
  <div class="col">
  <p class="h5 mt-3 text-center font-weight-bold">Complain Box</p>
  </div>
  </div>
</div>
  <div class="card-body">
  <form action ="<?= base_url('/admin/save/'. $s->id);?>" method="post" enctype="multipart/form-data">
<?= csrf_field(); ?>
<div class="mb-3">
<label for="email" class="form-label">Pengirim</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= $s->email; ?>" disabled>
</div>
  <div class="mb-3">
  <label for="kepada" class="form-label">Kepada</label>
    <input type="text" class="form-control" id="kepada" name="kepada" value="<?= $s->kepada; ?>" disabled>
</div>  
  <div class="mb-3">
  <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" value="<?= $s->subject; ?>" disabled>
</div>
<div class="mb-5">
  <label for="complain" class="form-label">Complain</label>
  <textarea type="text" class="form-control" id="complain" rows="5" id="complain" name="complain" disabled><?= $s->complain;?></textarea>
</div>
<div class="mb-3">
    <input type="hidden" class="form-control" id="status" name="status" value="1">
</div>
<button type="submit" class="btn btn-success mt-3 btn-user btn-block">Print</button>  
  </div>
</div>
   
            
            
</div>

<?= $this->endSection(); ?>