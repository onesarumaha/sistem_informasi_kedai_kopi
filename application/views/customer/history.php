<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>HISTORY</label>
											
										</div>
										<div class="single-shorter">
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
						
								<table class="table table-hover">
									  <thead>
									    <tr>
									      <th scope="col">No</th>
									      <th scope="col">Tanggal / Waktu</th>
									      <th scope="col">Status</th>
									      <th scope="col">Total  </th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($checkout as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td><?= date('d-m-Y H:i:s', strtotime($ord['tgl'])) ?></td>
									      <td><?= $ord['status'] ?></td>
									      <td>Rp. <?= number_format($ord['jumlah_bayar']) ?></td>
									    </tr>
									<?php endforeach; ?>
										<tr>
									      <td colspan="7">
									      	<?php if(empty($order) ) : ?>
					                  <div class="alert alert-danger" role="alert">
					                  <center> <i style="font-size: 15px;">Data Tidak Ada !</i></center>
					                  </div>
					                <?php endif; ?>
									      </td>
									      
									    </tr>

									  </tbody>
									</table>
													

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

		
		
		
