<?php 
    $auth = $this->session->userdata('auth');
    if (empty($auth)) {
        redirect(base_url('login'),'refresh');
    }else {
        if ($auth['level'] == "admin") {
            redirect(base_url('dashboard'),'refresh');
        }
    }
?>


<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <?php 
                if ($this->session->flashdata('msg')) {
                    $sukses = $this->session->flashdata('msg');
                    echo '<div class="alert alert-success">'.$sukses.'</div>';
                }
            ?>
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Form Cek Ketersediaan Kamar</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('ketersediaan') ?>" method="post">
                        <div class="row">
                            <input type="hidden" name="durasi-menginap" id="durasi-menginap">
                            <div class="col-md-4">
                                <label>Check In</label>
                                <input type="text" class="form-control" id="check-in" name="check-in" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label>Check Out</label>
                                <input type="text" class="form-control" id="check-out" name="check-out" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <label>Total Tamu</label>
                                <select name="total-tamu" id="total-tamu" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="submit" class="btn btn-block btn-info">
                                    <i class="fa fa-search"></i> CARI KETERSEDIAAN KAMAR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

