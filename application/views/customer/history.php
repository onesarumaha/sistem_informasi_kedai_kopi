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
									      <th scope="col">Kode Order</th>
									      <th scope="col">Pembayaran</th>
									      <th scope="col">Total  </th>
									      <th scope="col">Option</th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php 
									  	$no = 1;
									  	foreach($historynya as $ord) : ?>
									    <tr>
									      <th scope="row"><?= $no++ ?></th>
									      <td><?= date('d-m-Y H:i:s', strtotime($ord['tgl_order'])) ?></td>
									      <td><?= $ord['kode_order'] ?></td>
									      <td><?= $ord['status'] ?></td>
									      <td>Rp. <?= number_format($ord['jumlah']) ?></td>
									      <td><button class="btn" data-toggle="modal" data-target="#exampleModal<?= $ord['kode_order'] ?>" title="Detail Pesanan" href="#">Detail</button></td>
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


		<?php foreach($checkout as $ord) :  ?>
		<div class="modal fade" id="exampleModal<?= $ord['kode_order'] ?>" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
						</div>
						<div class="modal-body">
							<div class="row no-gutters">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<section class="shop checkout section">
								<div class="col-lg-12 col-12">
									<div class="order-details">
										<!-- Order Widget -->
										<div class="single-widget">
											<h2>Daftar Pesanan <?= $ord['kode_order'] ?></h2>
											<table class="table table-hover table-bordered">
												  <thead>
												    <tr>
												      <th scope="col">No </th>
												      <th scope="col">Kode Menu</th>
												      <th scope="col">Nama Menu</th>
												      <th scope="col">Qty</th>
												      <th scope="col">Harga @</th>
												    </tr>
												  </thead>
												  <tbody>
												  	 <?php 
                                                    $koneksi = new mysqli("localhost","root","","skripsi8");

                                                        $kode = $ord['kode_order'];
                                                         $sql_tampil = "SELECT * FROM pesanan
                                        JOIN order_menu ON order_menu.id_order = pesanan.id_order
                                        JOIN daftar_menu ON daftar_menu.id_menu = pesanan.id_menu
                                        WHERE kode_order = '$kode' ";
                                        
                                        $query_tampil = mysqli_query($koneksi, $sql_tampil);
                                        $no=1;
                                        while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {

                                                    ?>
												    <tr>
												      <th scope="row"><?= $no++ ?></th>
												      <td><?= $data['kode_menu'] ?></td>
												      <td><?= $data['nama_menu'] ?></td>
												      <td><?= $data['qty'] ?></td>
												      <td>Rp. <?= number_format($data['harga']) ?></td>
												    </tr>

												    <?php } ?>
												  </tbody>
												</table>
										</div>
									
										
										<!--/ End Button Widget -->
									</div>
								</div>
							</section>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		
		
		
<?php endforeach ?>