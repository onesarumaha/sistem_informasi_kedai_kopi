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
									      <th scope="col">Item</th>
									      <th scope="col">Qty</th>
									      <th scope="col">Harga @ </th>
									      <th scope="col">Total  </th>
									      <th scope="col">Aksi</th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($order as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td><?= $ord['tgl'] ?></td>
									      <td><?= $ord['nama_produk'] ?></td>
									      <td><?= $ord['qty'] ?></td>
									      <td>Rp. <?= number_format($ord['harga'] ) ?> -, </td>
									      <td>Rp. <?= number_format($ord['qty'] * $ord['harga'] ) ?> -, </td>
									      <td>
									      	<a href="<?= base_url('pelanggan/hapus/') ?><?= $ord['id_order'] ?>" class="hapus-orderan"><button class="btn">Hapus</button></a>
									      </td>
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

		
		
		
