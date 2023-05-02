<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

<div class="col-lg-9 col-md-8 col-12">
	<div class="row">
		<div class="col-12">
			<!-- Shop Top -->
			<div class="shop-top">
				<div class="shop-shorter">
					<div class="single-shorter">
						<label>PEMBAYARAN</label>
						
					</div>
					<div class="single-shorter">
						<section id="contact-us" class="contact-us section">
							<div class="container">
									<div class="contact-head">
										<div class="row">
											<div class="col-lg-12 col-12">
											<button class="btn float-right mt-5" data-toggle="modal" data-target="#exampleModal"> Daftar Rekening</button>

												<div class="form-main">
													<div class="title">
														<h4>Pembayaran</h4>
														<h3>Upload Bukti Bayar</h3>

													</div>
													<form class="form" method="POST" action="<?= base_url('pelanggan/bukti_bayar/') ?><?= $bayar['id_pembayaran'] ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="col-lg-6 col-12">
																<div class="form-group">
																	<label>Masukkan No. Meja<span>*</span></label>
																	<input required name="no_meja" placeholder="Masukkan No. Meja" type="number" min="0">
																</div>
															</div>

															<div class="col-lg-6 col-12">
																<input type="hidden" name="id_pembayaran" value="<?= $bayar['id_pembayaran'] ?>" >
																<input type="hidden" name="id_order" value="<?= $bayar['id_order'] ?>" >
																<div class="form-group">
																	<label>Jumlah Bayar<span>*</span></label>
																	<input name="name" disabled  placeholder="Rp. <?= number_format( $bayar['jumlah'] )?>">
																	<input type="hidden" name="jumlah" value="<?= $bayar['jumlah'] ?>">
																</div>
															</div>
															<div class="col-lg-6 col-12">
																<div class="form-group">
																	<label>Metode Bayar<span>*</span></label>
																	<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
																	  <option value="Tunai">Tunai</option>
																	  <option value="Lunas">Transfer</option>
																	</select>
																</div>
															</div>
															
															<div class="col-lg-6 col-12">
																<div class="form-group">
																	<label>Bukti Bayar</label>
																	<input name="upload_bayar" type="file" placeholder="">
																</div>
															</div>

															<div class="col-12">
																<div class="form-group button">
																	<button type="submit" class="btn ">Upload</button>
																	<!-- <a class="btn hapus-checkout" href="<?= base_url('pelanggan/hapus_checkout/') ?><?= $bayar['id_pembayaran'] ?>">Batal Bayar</a> -->
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
						</section>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
		</div>
	</div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<section class="shop checkout section">
								<div class="col-lg-12 col-12">
									<div class="order-details">
										<!-- Order Widget -->
										<div class="single-widget">
											<h2>DAFTAR REKENING</h2>
											<div class="content">
												<ul>
													<li>OVO<span>Kedai Kopi Samudera | 081277260797 </span></li>
													<li>GOPAY<span>Kedai Kopi Samudera | 081277260797</span></li>
													<li>DANA<span>Kedai Kopi Samudera | 081277260797</span></li>
													<li>BCA<span>Kedai Kopi Samudera | 081277260797</span></li>
													<li>BRI<span>Kedai Kopi Samudera | 081277260797</span></li>
												</ul>
											</div>
										</div>
									
										
										<!--/ End Button Widget -->
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>

		
		
		
