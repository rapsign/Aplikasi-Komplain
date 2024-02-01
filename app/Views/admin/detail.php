<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url('/admin');?>">User</a></li>
    <li class="breadcrumb-item active" aria-current="page">User Detail</li>
  </ol>
</nav>

<div class="container">
    <div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-header text-center font-weight-bold">
            <p class="h5 mt-3 font-weight-bold">User Detail</p>
        </div>
    <div class="row">
        <div class="card-body">
            <div class="card mb-3" style="max-width:100%">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/profile/' . $users->user_image); ?>" alt="<?= $users->username;?>" style="width:100%;">
                    </div>
                        <div class="col-md-8">
                            <div class="card-body mt-5">
                            <dl class="row">
                                <dt class="col-sm-3 card-title">Username</dt>
                                <dd class="col-sm-8">:  <?= $users->username;?></dd>

                                <dt class="col-sm-3 card-title">Email</dt>
                                <dd class="col-sm-8 text-primary" >:  <?= $users->email;?></dd>
                                <dt class="col-sm-3 card-title">Fullname</dt>
                                <dd class="col-sm-8">:  <?= $users->fullname;?></dd>
                               
                            </div>
                           
                        </div>
                        
                    
                        </div>
                        
                </div>
                <div class="float-right mx-5">
                            <a href="<?= base_url('admin');?>" class="btn btn-primary "><i class="fa fa-chevron-circle-left" aria-hidden="true">&nbsp;Kembali</i></a>
                            <a href="<?= base_url('admin/remove/'. $users->userid);?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash" aria-hidden="true">&nbsp;Hapus</i></a>
                            </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>