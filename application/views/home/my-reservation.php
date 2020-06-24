<?php  
    $auth = $this->session->userdata('auth');
    $cus = $this->db->get_where('customers', ['user_id'=>$auth['id']])->row_array();
    $rsv = $this->db->get_where('reservations', ['customer_id'=>$cus['id']])->result_array();
?>
</style>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Pesanan Saya</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nama Pemesan</td>
                                        <td>No Transaksi</td>
                                        <td>Biaya Sewa</td>
                                        <td>Jenis Pembayaran</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rsv as $key => $r) { ?>
                                        <?php  
                                            $t = $this->db->get_where('transactions', ['reservation_id'=>$r['id']])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $r['name'] ?></td>
                                            <td><?= $t['code'] ?></td>
                                            <td>Rp. <?= number_format($t['amount']) ?></td>
                                            <td><?= strtoupper($t['payment_type']) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

