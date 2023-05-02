<div class="notif-datakeuangan" data-notifdatakeuangan="<?= $this->session->flashdata('notif'); ?>"></div>
 
 <div class="content-page">   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3"><?= $title ?></h4>
                        
                    </div>
                    <a href="#" class="btn btn-primary add-list" data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-3"></i>Input Pengeluaran</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-tables table mb-0 tbl-server-info table-hover">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Keterangan</th>
                            <th>Jenis Transaksi</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php 
                        $no = 1;
                        foreach($keuangan as $uang) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                           
                            <td><?= $uang['tgl'] ?></td>
                            <td><?= $uang['ket'] ?></td>
                            <td><?= $uang['jenis_transaksi'] ?></td>
                            <td><?= $uang['kategori'] ?></td>
                            <td>Rp. <?= number_format($uang['jumlah']) ?></td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-warning mr-2" data-placement="top" title="" data-original-title="Edit"
                                        href="#" data-toggle="modal" data-target="#edit<?= $uang['id_keuangan']; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-danger mr-2 hapus-uang" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="<?= base_url('Keuangan/hapus_transaksi/') ?><?= $uang['id_keuangan']; ?>"><i class="ri-delete-bin-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>
                        

                        <div class="modal fade" id="edit<?= $uang['id_keuangan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <form action="<?= base_url('Keuangan/edit_transaksi/') ?><?= $uang['id_keuangan']; ?>" method="POST"> 
                                        <input type="hidden" name="id_keuangan" value="<?= $uang['id_keuangan']; ?>"> 
                                          <div class="modal-body">
                                              <div class="popup text-left">
                                                  <h4 class="mb-3">Edit Transaksi</h4>
                                                  <div class="content create-workform bg-body">
                                                     <div class="pb-3">
                                                        <label class="mb-0">Kategori</label>
                                                        <select class="form-control" name="kategori">
                                                           <option value="<?= $uang['kategori'] ?>">Pilih Kategori</option>
                                                           <option value="Tagihan Listrik">Tagihan Listrik</option>
                                                           <option value="Tagihan Air">Tagihan Air</option>
                                                           <option value="Pembayaran Gaji">Pembayaran Gaji</option>
                                                        </select>
                                      <?= form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>

                                                    </div>
                                                    <div class="pb-3">
                                                        <label class="mb-0">Jumlah</label>
                                                        <input type="number" class="form-control" placeholder="Masukkan Jumlah" name="jumlah" id="jumlah" value="<?= $uang['jumlah'] ?>">
                                      <?= form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>

                                                    </div>
                                                    
                                                     <div class="pb-3">
                                                        <label class="mb-0">Keterangan</label>
                                                        <textarea class="form-control" name="ket" id="ket"><?= $uang['ket'] ?></textarea>
                                                        
                                      <?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>

                                                    </div>
						                             
						                              
                                                      

                                                      <div class="col-lg-12 mt-4">
                                                          <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                              <div class="btn btn-danger mr-4" data-dismiss="modal">Batal</div>
                                                              <button type="submit" class="btn btn-warning">Edit</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          </form>
                                      </div>
                                  </div>
                              </div> 




                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

<div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="<?= base_url('Keuangan/tambah') ?>" method="POST">  
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">Tambah Pengeluaran</h4>
                          <div class="content create-workform bg-body">

                              <div class="pb-3">
                                  <label class="mb-0">Kategori</label>
                                  <select class="form-control" name="kategori">
                                     <option selected="">Pilih Kategori</option>
                                     <option value="Tagihan Listrik">Tagihan Listrik</option>
                                     <option value="Tagihan Air">Tagihan Air</option>
                                     <option value="Pembayaran Gaji">Pembayaran Gaji</option>
                                  </select>
                <?= form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="pb-3">
                                  <label class="mb-0">Jumlah</label>
                                  <input type="number" class="form-control" placeholder="Masukkan Jumlah" name="jumlah" id="jumlah" value="<?= set_value('jumlah'); ?>">
                <?= form_error('jumlah','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              
                               <div class="pb-3">
                                  <label class="mb-0">Keterangan</label>
                                  <textarea class="form-control" name="ket" id="ket"></textarea>
                                  
                <?= form_error('ket','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              
                              <div class="pb-3">

                              <div class="col-lg-12 mt-4">
                                  <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                      <div class="btn btn-danger mr-4" data-dismiss="modal">Batal</div>
                                      <button type="submit" class="btn btn-primary">Tambah</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div> 