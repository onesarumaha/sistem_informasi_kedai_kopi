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
												<div class="form-main">
													<div class="title">
														<h4>Pembayaran</h4>
														<h3>Upload Bukti Bayar</h3>
													</div>
													<form class="form" method="POST" action="<?= base_url('pelanggan/bukti_bayar/') ?>" enctype="multipart/form-data">
														<?php foreach($checkout as $cek) : ?>
														<div class="row">
															<div class="col-lg-6 col-12">
																<input type="hidden" name="id_pembayaran" value="<?//= $bayar['id_pembayaran'] ?>" >
																<input type="hidden" name="id_order" value="<?//= $bayar['id_order'] ?>" >
																<div class="form-group">
																	<label>Jumlah Bayar<span>*</span></label>
																	<input name="name" disabled  placeholder="Rp. <?= number_format( $cek['jumlah'] )?>">
																</div>
															</div>
															<div class="col-lg-6 col-12">
																<div class="form-group">
																	<label>Bukti Bayar<span>*</span></label>
																	<input name="upload_bayar" type="file" placeholder="" required>
																</div>
															</div>
															
															<div class="col-12">
																<div class="form-group button">
																	<button type="submit" class="btn ">Upload</button>
																	<a class="btn hapus-checkout" href="<?= base_url('pelanggan/hapus_checkout/') ?><?= $cek['id_pembayaran'] ?>">Batal Bayar</a>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
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
		<!--/ End Product Style 1  -->	

		
		
		
