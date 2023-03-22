<div class="notif-data" data-notifdata="<?= $this->session->flashdata('notif'); ?>"></div>
 
 <div class="content-page">   
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Data Produk</h4>
                        
                    </div>
                    <a href="page-add-product.html" class="btn btn-primary add-list" data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-3"></i>Tambah Produk</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-tables table mb-0 tbl-server-info table-hover">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php 
                        $no = 1;
                        foreach($produks as $produk) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url() . '/assets/gambar/' . $produk['gambar'] ?>" class="img-fluid rounded avatar-70 mr-3" alt="image">
                                    <div>
                                        <?= $produk['nama_produk'] ?>
                                        <p class="mb-0"><small><?= $produk['kode_produk'] ?></small></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $produk['nama_kategori'] ?></td>
                            <td><?= $produk['nama_satuan'] ?></td>
                            <td><?= $produk['harga'] ?></td>
                            <td><?= $produk['diskon'] ?></td>
                            
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="#"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="#"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2 hapus-produk" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="<?= base_url('produk/hapus_produk/') ?><?= $produk['id_produk']; ?>"><i class="ri-delete-bin-line mr-0"></i></a>
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

<div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form enctype="multipart/form-data" action="<?= base_url('produk/submit_produk') ?>" method="POST">  
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">Tambah Data Produk</h4>
                          <div class="content create-workform bg-body">
                              <div class="pb-3">
                                  <label class="mb-0">Nama Produk</label>
                                  <input type="text" class="form-control" placeholder="Masukkan Nama Produk" name="nama_produk">
                <?= form_error('nama_lengkap','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="pb-3">
                                    <label class="mb-0">Satuan</label>
                                    <select class="form-control mb-0" name="satuan">
                                       <option selected="">-- Pilih Satuan</option>
                                       <option value="1">One</option>
                                       <option value="2">Two</option>
                                       <option value="3">Three</option>
                                    </select>
                <?= form_error('satuan','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="pb-3">
                                    <label class="mb-0">Kategori</label>
                                    <select class="form-control mb-0" name="kategori">
                                       <option selected="">-- Pilih Kategori</option>
                                       <option value="1">One</option>
                                       <option value="2">Two</option>
                                       <option value="3">Three</option>
                                    </select>
                <?= form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="pb-3">
                                  <label class="mb-0">Harga</label>
                                  <input type="number" class="form-control" placeholder="Masukkan Harga Produk" name="harga">
                <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="pb-3">
                                  <label class="mb-0">Diskon</label>
                                  <input type="number" class="form-control" placeholder="Masukkan Harga Diskon" name="diskon">
                <?= form_error('diskon','<small class="text-danger pl-3">','</small>'); ?>

                              </div>
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                  <label class="custom-file-label" for="customFile">Upload Gambar</label>

                               </div>

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