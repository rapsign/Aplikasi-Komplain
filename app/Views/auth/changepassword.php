<?= $this->extend('auth/templates/index');?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            <div class="card">
                <h4 class="card-header text-center"><?=lang('Auth.forgotPassword')?></h4>
                <div class="card-body">

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <p><?=lang('Auth.enterEmailForInstructions')?></p>

                    <form action="<?= route_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="email"><?=lang('Auth.emailAddress')?></label>
                            <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block"><?=lang('Auth.sendInstructions')?></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>