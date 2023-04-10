<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>DAFTAR MENU</label>
											
										</div>
										<div class="single-shorter">
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
						<?php foreach($produks as $produk) : ?>

							<div class="col-lg-4 col-md-6 col-12">
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="default-img" src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
											<img class="hover-img" src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
											<!-- <span class="new">New</span> -->

										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#exampleModal<?= $produk['id_menu'] ?>" title="Detail Menu" href="#"><i class=" ti-eye"></i><span>Detail Menu</span></a>
												<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Like</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
											</div>
											<div class="product-action-2">
												<a title="Order" href="#">Order</a>
											</div>
										</div>
									</div>
									<div class="product-content">
										<h3><a href="product-details.html"><?= $produk['nama_menu'] ?></a></h3>
										<div class="product-price">
											<span>Rp. <?= number_format($produk['harga']) ?></span>
										</div>
									</div>
								</div>
							</div>

							<!-- Modal -->
			<div class="modal fade" id="exampleModal<?= $produk['id_menu'] ?>" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<!-- Product Slider -->
										<div class="product-gallery">
											<div class="quickview-slider-active">
												<div class="single-slider">
													<img src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
												</div>
												<div class="single-slider">
													<img src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
												</div>
											</div>
										</div>
									<!-- End Product slider -->
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
									<div class="quickview-content">
										<h2> <?= $produk['nama_menu'] ?></h2>
										<div class="quickview-ratting-review">
											<div class="quickview-ratting-wrap">
												<div class="quickview-ratting">
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="yellow fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<a href="#"> (1 customer review)</a>
											</div>
											<div class="quickview-stock">
												<span><i class="fa fa-check-circle-o"></i> in stock</span>
											</div>
										</div>
										<h3>Rp. <?= number_format($produk['harga']) ?> -,</h3>
										<div class="quickview-peragraph">
											<p><?= $produk['deskripsi'] ?></p>
										</div>
											
										<div class="quantity">
											<!-- Input Order -->
										<form action="<?= base_url('Pelanggan/order') ?>" method="POST">

											<div class="input-group">
												<div class="button minus">
													<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="qty">
														<i class="ti-minus"></i>
													</button>
												</div>
												<input type="number" name="qty" class="input-number"  data-min="1" data-max="1000" value="1">
												<div class="button plus">
													<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
														<i class="ti-plus"></i>
													</button>
												</div>
											</div>
											<!--/ End Input Order -->
											 <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>"> 
											 <input type="hidden" name="id_menu" value="<?= $produk['id_menu']?>"> 
										</div>
										<div class="add-to-cart">
											<button type="submit" class="btn">Order</button>
											<!-- <a href="#" class="btn min"><i class="ti-heart"></i></a>
											<a href="#" class="btn min"><i class="fa fa-compress"></i></a> -->
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal end -->







						<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		
		
		
