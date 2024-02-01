<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>

<section class="section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 col-lg-3 col-md-6">
                <a href="<?= base_url('complain/myComplain'); ?>">
                    <div class="card" style="width:30rem; height:10rem;">
                        <div class="card-body px-3 py-4-5 text-center pt-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon">
                                        <i class="bi bi-file-earmark-medical-fill text-success" style="font-size: 2rem;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold text-left">Komplain Saya</h6>
                                    <h6 class="font-extrabold mb-0 text-left"><?= $complain ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>




<?= $this->endSection(); ?>