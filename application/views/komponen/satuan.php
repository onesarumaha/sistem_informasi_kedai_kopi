<div class="notif-datasat" data-notifdatasat="<?= $this->session->flashdata('notif'); ?>"></div>
 
 <div class="content-page">   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3"><?= $title ?></h4>
                        
                    </div>
                    <a href="#" class="btn btn-primary add-list" data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-3"></i>Tambah Satuan</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-tables table mb-0 tbl-server-info table-hover">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No</th>
                            <th>Nama Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php 
                        $no = 1;
                        foreach($satuan as $produk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                           
                            <td><?= $produk['nama_satuan'] ?></td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge bg-warning mr-2" data-placement="top" title="" data-original-title="Edit"
                                        href="#" data-toggle="modal" data-target="#edit<?= $produk['id_satuan']; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-danger mr-2 hapus-satuan" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="<?= base_url('satuan/hapus_satuan/') ?><?= $produk['id_satuan']; ?>"><i class="ri-delete-bin-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>
                        

                        <div class="modal fade" id="edit<?= $produk['id_satuan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <form action="<?= base_url('satuan/edit_satuan/') ?><?= $produk['id_satuan']; ?>" method="POST"> 
                                        <input type="hidden" name="id_satuan" value="<?= $produk['id_satuan']; ?>"> 
                                          <div class="modal-body">
                                              <div class="popup text-left">
                                                  <h4 class="mb-3">Edit Satuan</h4>
                                                  <div class="content create-workform bg-body">
                                                      <div class="pb-3">
                                                          <label class="mb-0">Nama Satuan</label>
                                                          <input type="text" class="form-control" placeholder="Masukkan Nama Satuan" name="nama_satuan" value="<?= $produk['nama_satuan'] ?>">
                                        <?= form_error('nama_satuan','<small class="text-danger pl-3">','</small>'); ?>

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
                <form enctype="multipart/form-data" action="<?= base_url('satuan/submit_satuan') ?>" method="POST">  
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">Tambah Satuan</h4>
                          <div class="content create-workform bg-body">
                              <div class="pb-3">
                                  <label class="mb-0">Nama Satuan</label>
                                  <input type="text" class="form-control" placeholder="Masukkan Nama Satuan" name="nama_satuan">
                <?= form_error('nama_satuan','<small class="text-danger pl-3">','</small>'); ?>

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