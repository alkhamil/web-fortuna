<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Data Transaksi</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                    <th>No Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email Pelanggan</th>
                                    <th>Biaya Sewa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $key => $t) { ?>
                                    <?php 
                                        $rsv = $this->db->get_where('reservations',['id'=>$t['reservation_id']])->row_array();
                                    ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $t['code'] ?></td>
                                        <td><?= $rsv['name'] ?></td>
                                        <td><?= $rsv['email'] ?></td>
                                        <td>Rp. <?= number_format($t['amount']) ?></td>
                                        <td>
                                            <?php if ($t['payment_status'] == 0) { ?>
                                                <a href="<?= base_url('transaksi/approve/'.$t['id']) ?>" class="btn btn-success btn-sm">Approve</a>
                                            <?php } ?>
                                            <a class="btn btn-secondary btn-sm" target="_blank" href="<?= base_url('assets/uploads/'.$t['bukti_transfer']) ?>">Lihat Bukti Pembayaran</a>
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
