<section>

</section>
<?php 
    $session = $this->session->userdata('account');
?>
<main id="main">
    <section class="registration pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <hr>
                        <h1>Terimakasih telah melakukan pendaftaran akun</h1>
                        <hr>
                    </div>
                    <div class="card">
                        <div class="card-header bg-success">
                            <h4 class="text-center text-white">Informasi Akun Anda</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h2>Username: <?= $session['username'] ?></h2>
                                <h2>Password: <?= $session['password'] ?></h2>
                            </div>
                            <div class="text-center">
                                <a href="<?= base_url('login') ?>" class="btn btn-primary">Silahkan Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>