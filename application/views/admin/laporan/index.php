<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Laporan Transaksi</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="<?= base_url('laporan/cari') ?>" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dari</label>
                                    <input type="text" id="dari" name="dari" value="<?= date('d-m-Y') ?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <input type="text" id="sampai" name="sampai" value="<?= date('d-m-Y') ?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-white">.</label>
                                    <button type="submit" class="btn btn-block btn-primary">
                                        <i class="fa fa-search"></i> Cari
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-white">.</label>
                                    <a target="_blank" href="<?= base_url('laporan/cetak-pdf/'.$dari.'/'.$sampai) ?>" class="btn btn-block btn-primary">
                                        <i class="fa fa-print"></i> Cetak Laporan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <div class="table-responsive">
                        <table class="table table-hover table-sm table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Transaksi</th>
                                    <th>Nama Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Biaya Sewa</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $key => $l) { ?>
                                    <?php 
                                        $rsv = $this->db->get_where('reservations', ['id'=>$l['reservation_id']])->row_array();
                                        $class = $this->db->get_where('classes', ['id'=>$rsv['class_id']])->row_array();
                                    ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $l['code'] ?></td>
                                        <td><?= $rsv['name'] ?></td>
                                        <td><?= $class['name'] ?></td>
                                        <td>Rp. <?= number_format($l['amount']) ?></td>
                                        <td><?= date('d-m-Y', strtotime($l['created_at'])) ?></td>
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
