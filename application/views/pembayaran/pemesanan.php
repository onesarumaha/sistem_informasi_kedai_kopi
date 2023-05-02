<div class="notif-dataantar" data-notifdataantar="<?= $this->session->flashdata('notif'); ?>"></div>
 
 <div class="content-page">   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3"><?= $title ?></h4>
                        
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-tables table mb-0 tbl-server-info table-hover">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No</th>
                            <th>Tanggal Order</th>
                            <th>Nama Pelaggan</th>
                            <th>Kode Order</th>
                            <th>No. Meja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php 
                        $no = 1;
                        foreach($pembayaran as $byr) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                           
                            <td><?= $byr['tgl_order'] ?></td>
                            <td><?= $byr['username'] ?></td>
                            <td><?= $byr['kode_order'] ?></td>
                            <td><?= $byr['no_meja'] ?></td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-success mr-2" data-placement="top" title="" data-original-title="Edit"
                                        href="#" data-toggle="modal" data-target="#edit<?= $byr['kode_order']; ?>"><i class="ri-eye-line mr-0"></i></a>
                                   
                                </div>
                            </td>
                        </tr>
                        

                        




                    <?php endforeach ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
</div>

<?php foreach($detail as $byr) : ?>
<div class="modal fade" id="edit<?= $byr['kode_order']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                      <div class="modal-content">
                                        <form action="<?= base_url('Pemesanan/antar/') ?><?= $byr['id_order']; ?>" method="POST"> 
                                        <input type="hidden" name="id_order" value="<?= $byr['id_order']; ?>"> 
                                        <input type="hidden" name="status_order" value="Selesai"> 
                                          <div class="modal-body">
                                              <div class="popup text-left">
                                                  <h4 class="mb-3">Daftar Pesanan <?= $byr['kode_order']; ?></h4>
                                                  <div class="content create-workform bg-body">
                                                    <table class="data-table table mb-0 tbl-server-info">
                                                      <thead class="bg-white text-uppercase">
                                                          <tr class="ligth ligth-data">
                                                              <th>Kode Menu</th>
                                                              <th>Menu</th>
                                                              <th>Qty</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody class="ligth-body">
                                                        
                                                          <tr>
                                                              
                                                              <td><?= $byr['kode_menu'] ?></td>
                                                              <td><?= $byr['nama_menu'] ?></td>
                                                              <td><?= $byr['qty'] ?></td>
                                                              
                                                              
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                                      

                                                      <div class="col-lg-12 mt-4">
                                                          <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                              <div class="btn btn-danger mr-4" data-dismiss="modal">Close</div>
                                                              <button type="submit" class="btn btn-success">Antar</button>
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