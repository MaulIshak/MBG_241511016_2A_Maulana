<?=$this->extend('layout/template');?>
<?=$this->section('content');?>
	<section class="d-flex align-items-center min-vh-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4 text-center">
								<img src="<?=base_url('img/Logo_Badan_Gizi_Nasional.png')?>" alt="logo bfg" width="75" class="d-block align-text-top mx-auto">
									<span class="fw-bold">
										Pantau<span class="text-success">MBG</span> 
									</span>
							</h1>
							<p class="text-center text-muted mb-4">Silakan masuk untuk melanjutkan</p>
              <!-- Notifikasi -->
              <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= session()->getFlashdata('success') ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php endif; ?>
              <?php if(session()->getFlashdata('error')): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= session()->getFlashdata('error') ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php endif; ?>

              <!-- Login Form -->
							<form method="POST" class="needs-validation" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Email</label>
									<input id="email" type="text" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary w-100 mt-2" id="btnSubmit" disabled>
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2025 &mdash; Maulana Ishak
					</div>
				</div>
			</div>
		</div>
	</section>
<?=$this->endSection();?>

