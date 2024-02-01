<?= $this->extend('templates/index');?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/user');?>">Profile</a></li>
    <li class="breadcrumb-item active" aria-current="page">User</li>
  </ol>
</nav>

<div class="container"> 
<?= view('Myth\Auth\Views\_message_block') ?>
<div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
  <div class="card-header">
  <div class="row">
  <div class="col">
  <p class="h5 mt-3 text-center font-weight-bold">USER</p>
  </div>
  </div>
</div>
  <div class="card-body  table-responsive ">
  <table class="table table-bordered table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $user->username; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><span class="badge badge-<?= ($user->name == 'admin')? 'success' : 'warning' ?>"><?= $user->name; ?></span></td>
                            <td>
                            <a href="<?= base_url('admin/'. $user->userid);?>" class="btn btn-success"><i class="fa fa-cogs" aria-hidden="true">&nbsp;Detail</i></a>
                            </td>
                            </tr>
                    <?php endforeach;?>
                    </tbody>
            </table>
  </div>
</div>
   
            
            
</div>

<?= $this->endSection(); ?>