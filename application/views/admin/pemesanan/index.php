<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Data Pemesanan</h1>
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
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Tanggal Menginap</th>
                                    <th>Biaya Sewa</th>
                                    <th>Status Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemesanan as $key => $p) { ?>
                                    
                                    <?php  
                                        $room = $this->db->get_where('rooms', ['id'=>$p['room_id']])->row_array();
                                        $class = $this->db->get_where('classes', ['id'=>$room['class_id']])->row_array();
                                        $trx = $this->db->get_where('transactions', ['reservation_id'=>$p['id']])->row_array();
                                    ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $room['title'] ?></td>
                                        <td><?= $class['name'] ?></td>
                                        <td><?= $p['checkin_date'].' s/d '.$p['checkout_date'] ?></td>
                                        <td>Rp. <?= number_format($trx['amount']) ?></td>
                                        <td>
                                            <?php if ($p['status'] == 1) { ?>
                                                <div class="badge badge-warning">SEDANG MENGINAP</div>
                                            <?php } else if($p['status'] == 2) { ?>
                                                <div class="badge badge-success">SELESAI</div>
                                            <?php } else if ($p['status'] == 0) { ?>
                                                <div class="badge badge-info">PESANAN BELUM DI APPROVE</div>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($p['status'] == 1) { ?>
                                                <a href="<?= base_url('pemesanan/checkout/'.$p['id']) ?>" class="btn btn-sm btn-success">Checkout</a>
                                            <?php } ?>
                                            <a href="<?= base_url('pemesanan/hapus/'.$p['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
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
