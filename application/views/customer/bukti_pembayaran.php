<div class="notif-dataorder" data-notifdataorder="<?= $this->session->flashdata('notif'); ?>"></div>

					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>BUKTI PEMBAYARAN</label>
											
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
									      <th scope="col">Kode Order</th>
									      <th scope="col">Pembayaran</th>
									      <th scope="col">Bukti Bayar</th>
									      <th scope="col">Total  </th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($bukti as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td>
									      	<?php if($ord['status'] == 'Lunas') : ?>
									      <?= $ord['kode_order'] ?>
									      	<?php endif ?>
									      	<?php if($ord['status'] == 'Belum Lunas') : ?>
									      		<a href="<?= base_url('pelanggan/bayar/') ?><?= $ord['id_pembayaran'] ?>" style="color:blue"><?= $ord['kode_order'] ?></a>
									      	<?php endif ?>
									      	<?php if($ord['status'] == 'Tunai') : ?>
									      		 <?= $ord['kode_order'] ?>
									      	<?php endif ?>
									      </td>
									      <td><?= $ord['status'] ?></td>
									      <td>
									      	<?php if($ord['status'] == 'Lunas') : ?>
									      		<img class="default-img" src="<?= base_url() . '/assets/gambar/' . $ord['upload_bayar'] ?>" height="20px" width="50px">
									      	<?php endif ?>
									      	<?php if($ord['status'] == 'Tunai') : ?>
									      				Segera Bayar Dikasir !
									      	<?php endif ?>

									      	<?php if($ord['status'] == 'Belum Lunas') : ?>
									      		<label style="color: red">Bukti Bayar Belum Ada!</label>
									      	<?php endif ?>
									      </td>
									     
									      <td>Rp. <?= number_format($ord['jumlah']) ?></td>
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

		
		
		
