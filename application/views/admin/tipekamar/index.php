<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Tipe Kamar</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-kamar">
                <i class="fa fa-plus"></i> Tambah
            </button>
            <?php 
                if ($this->session->flashdata('msg')) {
                    $sukses = $this->session->flashdata('msg');
                    echo '<div class="alert alert-success">'.$sukses.'</div>';
                }

                if ($this->session->flashdata('error')) {
                    $error = $this->session->flashdata('error');
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tipekamar as $key => $tk) { ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/uploads/'.$tk['photo']) ?>" class="img-fluid" width="100">
                                        </td>
                                        <td><?= $tk['name'] ?></td>
                                        <td><?= $tk['description'] ?></td>
                                        <td>Rp. <?= number_format($tk['price'], 2) ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="tambah-kamar" tabindex="-1" role="dialog" aria-labelledby="tambah-kamarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-kamarLabel">Tambah Tipe Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('tipekamar/tambah') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-gruop">
                <label>Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-gruop">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" name="photo" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="description" class="form-control" cols="10" rows="5"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
