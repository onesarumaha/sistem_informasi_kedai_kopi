<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>DAFTAR PESANAN</label>
											
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
									      <th scope="col">Kode Order</th>
									      <th scope="col"> Pembayaran</th>
									      <th scope="col"> Status</th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($order as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td><?= date('d-m-Y', strtotime($ord['tgl_order'])) ?></td>
									      <td><a href="<?= base_url('pelanggan/detail_pesanan/') ?><?= $ord['kode_order'] ?>" class="text-primary"><?= $ord['kode_order'] ?></a></td>
									      <td><?= $ord['status'] ?></td>
									      <td><b><?= $ord['status_order'] ?><b></td>
									    
									    </tr>
									<?php endforeach; ?>
										<tr>
									      <td colspan="7">
									      	<?php if(empty($order) ) : ?>
					                  <div class="alert alert-danger" role="alert">
					                  <center> <i style="font-size: 15px;">Pesanan Tidak Ada !</i></center>
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

		
		
		
