<?= $this->extend('auth/templates/index');?>
<?= $this->section('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
                		<div class="col-md">
							<div class="p-5">
								<div class="text-center mb-3">
                					<img src="<?= base_url();?>/img/logo.png" width="200" class="mb-3">
                				</div>
								<div class="text-center mb-3">
                					<p CLASS="font-weight-bold">KEJAKSAAN NEGERI</p>
                				</div>

									<?= view('Myth\Auth\Views\_message_block') ?>


									<form action="<?= route_to('login') ?>" method="post" class="user">
									<?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
										<div class="form-group">
												<input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
								   				name="login" placeholder="<?=lang('Auth.email')?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
<?php else: ?>


										<div class="form-group">
													<input type="text" class="form-control form-control-user <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
													name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
											<div class="invalid-feedback">
												<?= session('errors.login') ?>
											</div>
										</div>
<?php endif; ?>

										<div class="form-group">
												<input type="password" name="password" class="form-control form-control-user  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
											<div class="invalid-feedback">
												<?= session('errors.password') ?>
											</div>
										</div>

<?php if ($config->allowRemembering): ?>
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
												<?=lang('Auth.rememberMe')?>
											</label>
										</div>
<?php endif; ?>

										<br>
										<button type="submit" class="btn btn-success btn-user btn-block"><?=lang('Auth.loginAction')?></button>
									</form>

		<hr>
		
		
									<div class="text-center">
									<?php if ($config->allowRegistration) : ?>
					<p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
<?php if ($config->activeResetter): ?>
									<p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>
