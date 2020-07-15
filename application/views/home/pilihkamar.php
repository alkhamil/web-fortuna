<?php  
    $datacheckin = $this->session->userdata('datacheckin');
    $auth = $this->session->userdata('auth');
    if (empty($datacheckin['check-in'])) {
        redirect(base_url('home'),'refresh');
    }

    $pelanggan = $this->db->get_where('customers', ['user_id'=>$auth['id']])->row_array();
?>
<style>
.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}
.visa{background-image:url(<?= base_url('assets/uploads/mandiri.png') ?>);}
.mastercard{background-image:url(<?= base_url('assets/uploads/bca.png') ?>);}

.cc-selector input:active +.drinkcard-cc{opacity: .5;}
.cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:100px;height:70px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}

/* Extras */
a:visited{color:#888}
a{color:#999;text-decoration:none;}
p{margin-bottom:.3em;}
</style>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Bayar Pesanan</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('reservation') ?>" method="post">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header"><h6>Data Pemesan</h6></div>
                                    <div class="card-body">
                                        <?php  
                                            $class = $this->db->get_where('classes',['id' => $kamar['class_id']])->row_array();
                                        ?>
                                        <img class="card-img-top" width="50" src="<?= base_url('assets/uploads/'.$class['photo']) ?>" alt="Card image cap">
                                        <b class="card-title"><?= $kamar['title'] ?></b>
                                        <p>Harga: <?= number_format($class['price']) ?></p>
                                        <!-- untuk calculasi -->
                                        <input type="hidden" id="harga" value="<?= $class['price'] ?>">
                                        <input type="hidden" name="amount" value="<?= $class['price']*$datacheckin['durasi-menginap'] ?>">
                                        <input type="hidden" id="durasi" value="<?= $datacheckin['durasi-menginap'] ?>">
                                        <hr>
                                        <input type="hidden" name="customer_id" value="<?= $pelanggan['id'] ?>">
                                        <input type="hidden" name="class_id" value="<?= $class['id'] ?>">
                                        <input type="hidden" name="room_id" value="<?= $kamar['id'] ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" value="<?= $pelanggan['title'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Pemesan</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $pelanggan['name'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $pelanggan['email'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?= $pelanggan['phone'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Checkin</label>
                                                    <input type="text" class="form-control" name="check-in" value="<?= $datacheckin['check-in'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Checkout</label>
                                                    <input type="text" class="form-control" name="check-out" value="<?= $datacheckin['check-out'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Durasi Menginap</label>
                                                    <input type="text" class="form-control" name="durasi-menginap" value="<?= $datacheckin['durasi-menginap'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Tamu</label>
                                                    <input type="text" class="form-control" name="total-tamu" value="<?= $datacheckin['total-tamu'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header"><h6>Metode Pembayaran</h6></div>
                                    <div class="card-body">
                                        <div class="cc-selector">
                                            <input id="visa" type="radio" name="bank" value="mandiri" />
                                            <label class="drinkcard-cc visa" for="visa"></label>
                                            <input id="mastercard" type="radio" name="bank" value="bca" />
                                            <label class="drinkcard-cc mastercard"for="mastercard"></label>
                                        </div>
                                        
                                        <div id="bank">
                                            
                                        </div>

                                        <div class="card mb-2" style="border:dashed; display:none" id="bangCus">
                                            <div class="card-body" id="total">

                                            </div>
                                        </div>
                                        
                                        <button type="submit" id="btn-lanjut" class="btn btn-primary" disabled style="cursor:not-allowed">Lanjutkan Checkin</button>
                                        <h5 id="jam" class="text-danger text-center text-bold"></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

