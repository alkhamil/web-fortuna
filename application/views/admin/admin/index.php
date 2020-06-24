<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Data Admin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambah-admin">
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
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admin as $key => $a) { ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $a['username'] ?></td>
                                        <td><?= $a['email'] ?></td>
                                        <td><?= $a['password'] ?></td>
                                        <td><b class="text-info"><?= strtoupper($a['level']) ?></b></td>
                                        <td>
                                            <button data-toggle="modal" data-target="#edit-admin<?= $a['id'] ?>" class="btn btn-info btn-sm">Edit</button>
                                            <a href="<?= base_url('admin/hapus/'.$a['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="edit-admin<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah-kamarLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambah-kamarLabel">Edit Data Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/edit') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="user_id" value="<?= $a['id'] ?>">
                                                <div class="form-gruop">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" value="<?= $a['username'] ?>" name="username" required>
                                                </div>
                                                <div class="form-gruop">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" value="<?= $a['email'] ?>" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" required>  
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
<div class="modal fade" id="tambah-admin" tabindex="-1" role="dialog" aria-labelledby="tambah-kamarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah-kamarLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/tambah') ?>" method="post">
          <div class="modal-body">
            <div class="form-gruop">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-gruop">
                <label>Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>                 
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

