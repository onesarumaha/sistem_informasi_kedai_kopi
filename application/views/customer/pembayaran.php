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
																		<form class="form" method="POST" action="mail/mail.php">
																			<?php foreach($checkout as $cek) : ?>
																			<div class="row">
																				<div class="col-lg-6 col-12">
																					<div class="form-group">
																						<label>Jumlah Bayar<span>*</span></label>
																						<input name="name" disabled  placeholder="Rp. <?= number_format( $cek['jumlah_bayar'] )?>">
																					</div>
																				</div>
																				<div class="col-lg-6 col-12">
																					<div class="form-group">
																						<label>Bukti Bayar<span>*</span></label>
																						<input name="file" type="file" placeholder="">
																					</div>
																				</div>
																				
																				<div class="col-12">
																					<div class="form-group button">
																						<button type="submit" class="btn ">Upload</button>
																						<a class="btn hapus-checkout" href="<?= base_url('pelanggan/hapus_checkout/') ?><?= $cek['id_bayar'] ?>">Batal</a>
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
						<div class="row">
						
																			

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		
		
		
