<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</nav>

<div class="container">
    <?= view('Myth\Auth\Views\_message_block') ?>
    <div class="card mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="card-header text-center font-weight-bold">
            <p class="h5 mt-3 font-weight-bold">Profile Saya</p>
        </div>
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('/img/profile/' . user()->user_image); ?>" alt="<?= user()->username; ?>" style="width:100%;">
                </div>
                <div class="col-md-8 mt-5">
                    <div class="card-body mt-5">
                        <dl class="row">
                            <dt class="col-sm-3 card-title">Username</dt>
                            <dd class="col-sm-8">: <?= user()->username; ?></dd>

                            <dt class="col-sm-3 card-title">Email</dt>
                            <dd class="col-sm-8 text-primary">: <?= user()->email; ?></dd>
                            <dt class="col-sm-3 card-title">Nama Lengkap</dt>
                            <dd class="col-sm-8">: <?= user()->fullname; ?></dd>
                    </div>

                </div>
                <a href="<?= base_url('user/edit'); ?>/<?= user()->id; ?>" class="btn btn-success mt-5 btn-user btn-block">Ubah</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>