<?php  
    $auth = $this->session->userdata('auth');
    $dc = $this->session->userdata('datacheckin');
    $class = $this->db->get_where('classes', ['id'=>$dc['class_id']])->row_array();
    $room = $this->db->get_where('rooms', ['id'=>$dc['room_id']])->row_array();
    $rsv = $this->db->get_where('reservations', ['id'=>$dc['reservation_id']])->row_array();
    $trx = $this->db->get_where('transactions', ['id'=>$dc['reservation_id']])->row_array();
?>
</style>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <?php 
                if ($this->session->flashdata('error')) {
                    $error = $this->session->flashdata('error');
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            ?>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Upload Bukti Pembayaran</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table">
                                <tr>
                                    <td>Nama Pelanggan</td>
                                    <td>:</td>
                                    <td><?= $dc['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Contact</td>
                                    <td>:</td>
                                    <td><?= $dc['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Menginap</td>
                                    <td>:</td>
                                    <td><?= $dc['check-in'].' s/d '.$dc['check-out'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kamar</td>
                                    <td>:</td>
                                    <td><?= $room['title'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tipe Kamar</td>
                                    <td>:</td>
                                    <td><?= $class['name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Sewa</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($class['price']) ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <div class="row justify-content-center">
                                <div class="col-md-5 mt-5">
                                    <form action="<?= base_url('upload-pembayaran') ?>" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="trx_id" value="<?= $trx['id'] ?>">
                                        <div class="form-group">
                                            <label>Upload Bukti Pembayaran</label>
                                            <input type="file" class="form-control" name="bukti_transfer">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Proses</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

