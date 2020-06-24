<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Kamar</h1>
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
            ?>
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Number</th>
                                    <th>Tipe Kamar</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kamar as $key => $k) { ?>
                                    <?php 
                                        $class = $this->db->get_where('classes', ['id'=>$k['class_id']])->row_array();
                                    ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $k['title'] ?></td>
                                        <td><?= $k['number'] ?></td>
                                        <td>
                                            <b><?= $class['name'] ?></b>
                                        </td>
                                        <td>
                                            <?php if ($k['status'] == 1) { ?>
                                                <div class="badge badge-success">Available</div>
                                            <?php } else { ?>
                                                <div class="badge badge-warning">Not Available</div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit-kamar<?= $k['id'] ?>" class="btn btn-sm btn-info btn-sm">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <a href="<?= base_url('kamar/hapus/'.$k['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>

                                    <!-- Modal edit -->
                                    <div class="modal fade" id="edit-kamar<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah-kamarLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambah-kamarLabel">Edit Data Kamar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('kamar/edit') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="room_id" value="<?= $k['id'] ?>">
                                                <div class="form-gruop">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" value="<?= $k['title'] ?>" name="title" required>
                                                </div>
                                                <div class="form-gruop">
                                                    <label>No Kamar</label>
                                                    <input type="text" class="form-control" value="<?= $k['number'] ?>" name="number" required>
                                                </div>
                                                <div class="form-gruop">
                                                    <label>Tipe Kamar</label>
                                                    <select name="class_id" class="form-control">
                                                        <?php foreach ($tipekamar as $key => $tp) { ?>
                                                            <option <?php if($tp['id'] == $k['class_id']){ ?> selected <?php } ?> value="<?= $tp['id'] ?>"><?= $tp['name'] ?> ( Harga: <?= number_format($tp['price']) ?> )</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check mt-2">
                                                        <label class="form-check-label" style="cursor:pointer">
                                                            <input class="form-check-input" name="status" <?php if($k['status']==1) { ?> checked <?php } ?> type="checkbox">Aktif
                                                        </label>
                                                    </div>
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
        <h5 class="modal-title" id="tambah-kamarLabel">Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('kamar/tambah') ?>" method="post">
          <div class="modal-body">
            <div class="form-gruop">
                <label>Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-gruop">
                <label>No Kamar</label>
                <input type="text" class="form-control" name="number" required>
            </div>
            <div class="form-gruop">
                <label>Tipe Kamar</label>
                <select name="class_id" class="form-control">
                    <?php foreach ($tipekamar as $key => $tp) { ?>
                        <option value="<?= $tp['id'] ?>"><?= $tp['name'] ?> ( Harga: <?= number_format($tp['price']) ?> )</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <div class="form-check mt-2">
                    <label class="form-check-label" style="cursor:pointer">
                        <input class="form-check-input" name="status" type="checkbox" checked>Aktif
                    </label>
                </div>
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
