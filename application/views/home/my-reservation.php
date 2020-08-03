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
                                        <td>Tanggal</td>
                                        <td>Nama Pemesan</td>
                                        <td>No Transaksi</td>
                                        <td>Biaya Sewa</td>
                                        <td>Jenis Pembayaran</td>
                                        <td align="center">Status Pembayaran</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rsv as $key => $r) { ?>
                                        <?php  
                                            $t = $this->db->get_where('transactions', ['reservation_id'=>$r['id']])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= date('d-m-Y', strtotime($r['created_at'])) ?></td>
                                            <td><?= $r['name'] ?></td>
                                            <td><?= $t['code'] ?></td>
                                            <td>Rp. <?= number_format($t['amount']) ?></td>
                                            <td><?= strtoupper($t['payment_type']) ?></td>
                                            <td align="center">
                                                <?php if ($t['payment_status'] == 0) {?>
                                                    <div class="text-danger">Belum Bayar</div>
                                                    <button data-toggle="modal" data-target="#exampleModalLong<?= $r['id'] ?>" class="btn btn-sm btn-warning">Bayar Sekarang</button>
                                                <?php }else if($t['payment_status'] == 2) { ?>
                                                    <div class="text-info"><i class="fa fa-spin fa-spinner"></i> Menuggu Approval</div>
                                                <?php }else if($t['payment_status'] == 1) { ?>
                                                    <div class="text-success">Sudah Bayar</div>
                                                <?php } ?>
                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalLong<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <form action="<?= base_url('upload-pembayaran') ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <h5><?= $t['code'] ?></h5>
                                                        <input type="hidden" name="trx_id" value="<?= $t['id'] ?>">
                                                        <div class="form-group">
                                                            <label>Upload Bukti Pembayaran</label>
                                                            <input type="file" class="form-control" name="bukti_transfer">
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
    </div>
</div>

