
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class=""><a href="<?= base_url('pelanggan') ?>">Home</a></li>
													<li class=""><a href="<?= base_url('pelanggan') ?>">Produk</a></li>				
													<li><a href="<?= base_url('pelanggan/bukti_pembayaran') ?>">Bukti Bayar</a></li>				
													<li><a href="<?= base_url('pelanggan/history') ?>">Histori</a></li>												
													<li><a href="#">Keranjang<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="<?= base_url('pelanggan/pemesanan') ?>">Pemesanan</a></li>
															<li><a href="<?= base_url('pelanggan/pembayaran') ?>">Pembayaran</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?= base_url('pelanggan') ?>">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#"><?= $grid ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->