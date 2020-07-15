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
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>No Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tipe Kamar</th>
                                    <th>Biaya Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total=0; foreach ($laporan as $key => $l) { ?>
                                    <?php 
                                        $rsv = $this->db->get_where('reservations', ['id'=>$l['reservation_id']])->row_array();
                                        $class = $this->db->get_where('classes', ['id'=>$rsv['class_id']])->row_array();
                                        $total+=$l['amount'];
                                    ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= date('d-m-Y', strtotime($l['created_at'])) ?></td>
                                        <td><?= $l['code'] ?></td>
                                        <td><?= $rsv['name'] ?></td>
                                        <td><?= $class['name'] ?></td>
                                        <td align="right">Rp. <?= number_format($l['amount']) ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td align="center" colspan="5"><b>TOTAL</b></td>
                                    <td align="right"><b>Rp. <?= number_format($total) ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
