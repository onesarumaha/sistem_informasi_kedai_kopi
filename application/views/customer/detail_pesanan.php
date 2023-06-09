<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>DETAIL PESANAN</label>
											
										</div>
										<div class="single-shorter">
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
						<a class="mb-2" href="#order"><span>[+] Tambah Order</span></a>
								
								<table class="table table-hover">
									  <thead>
									    <tr>
									      <th scope="col">No</th>
									      <th scope="col">Item</th>
									      <th scope="col">Qty</th>
									      <th scope="col">Harga @ </th>
									      <th scope="col">Diskon  </th>
									      <th scope="col">Total  </th>
									      <th scope="col">Aksi</th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($pesanan as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td><?= $ord['nama_menu'] ?></td>
									      <td><?= $ord['qty'] ?></td>
									      <td>Rp. <?= number_format($ord['harga'] ) ?>  </td>
									      <td>Rp. <?= number_format($ord['diskon']) ?> </td>
									      <td>Rp. <?= number_format( @$tot = $ord['qty'] * $ord['harga'] + $ord['diskon'] ) ?>  </td>
									      <td>
									      	<a href="<?= base_url('pelanggan/hapus/') ?><?= $ord['id_pesanan'] ?>" class="hapus-orderan"><button class="btn">Hapus</button></a>
									      </td>
									      
									    </tr>
									<?php 
									@$jumlahtot += $tot; 
								endforeach; ?>
										<tr>
									      <td colspan="7">
									      	<?php if(empty($order) ) : ?>
					                  <div class="alert alert-danger" role="alert">
					                  <center> <i style="font-size: 15px;">Data Tidak Ada !</i></center>
					                  </div>
					                <?php endif; ?>
									      </td>
									      
									    </tr>

									    <tr>
									    	<th>Total Bayar</th>
									    	<th>: </th>
									    	<th>Rp. <?= @number_format(@$jumlah_bayar = $jumlahtot) ?></th>
									    </tr>
									     


									     <tr>
									    	<th colspan="3">
									    		<form action="<?= base_url('Pelanggan/submit_pesanan') ?>" method="POST">
									    			<input type="hidden" name="id_order" value="<?= @$ord['id_order'] ?>">
									    			<input type="hidden" name="jumlah" value="<?= $jumlah_bayar ?>">
									    			<?php if(@$jumlahtot < 1) { ?>

									    				<?php }else{ ?>
									    				<button class="btn">CHECKOUT</button>

									    			<?php } ?>
									    		</form>
									    	</th>
									    	
									    </tr>

									  </tbody>
									</table> 



							<div  id="order" class="col-12" style="margin-top:350px;">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Tambah Order</label>
											
										</div>
										<div class="single-shorter">
											
										</div>
									</div>
									
								</div>
							</div>

						<?php foreach($produks as $produk) : ?>

									<div class="col-lg-4 col-md-6 col-12" >
								<div class="single-product">
									<div class="product-img">
										<a href="#">
											<img class="default-img" src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
											<img class="hover-img" src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" alt="#">
											<!-- <span class="new">New</span> -->

										</a>
										<div class="button-head">
											<div class="product-action">
												<a data-toggle="modal" data-target="#tambahPesanan<?= $produk['id_menu'] ?>" title="Detail Menu"><i class=" ti-eye"></i><span>Detail Menu</span></a>
												<a title="Wishlist"><i class=" ti-heart "></i><span>Like</span></a>
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



	<?php foreach($pesanan as $psn) : ?>			
<!-- Modal -->
			<div class="modal fade" id="tambahPesanan<?= $produk['id_menu'] ?>" tabindex="-1" role="dialog">
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
										<form action="<?= base_url('Pelanggan/tambah_pesanan/') ?><?= $psn['kode'] ?>" method="POST">
											<input type="hidden" name="kode" value="<?= $psn['kode'] ?>">
											<input type="hidden" name="id_menu" value="<?= $psn['id_menu'] ?>">
											<input type="hidden" name="id_order" value="<?= $psn['id_order'] ?>">
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
											 <input type="hidden" name="id_menu" value="<?= $this->session->userdata('id_user')?>"> 
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


		<?php endforeach ?>

						<?php endforeach ?>

													

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	




		
		
		
