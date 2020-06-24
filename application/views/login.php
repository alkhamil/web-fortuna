<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />


        <title>Page Login</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
        <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />


    </head>

    <style>
        .main{
            background: #4C84FF;
            height: 97vh;
        }
        .vh-all {
            margin-top: 50%;
            margin-left: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }

        .bg-left {
            background: #F5F6FA;
        }

        .content-title {
            margin-top: 60%;
        }
        .content-title h4 {
            font-size: 30px;
        }
    </style>

</head>

<body>
    <div class="row main">
        <div class="col-md-3 bg-left">
            <div class="card border-0 vh-all">
                <div class="card-body mt-3">
                    <?php 
                        if ($this->session->flashdata('msg')) {
                            $sukses = $this->session->flashdata('msg');
                            echo '<span class="text-danger">'.$sukses.'</span>';
                        }
                    ?>
                    <h4 class="text-center mb-4"><a href="<?= base_url('/') ?>">HOTEL RAKACIA</a></h4>
                    <form action="<?= base_url('login-proses') ?>" method="post">
                        <div class="form-group col-md-12 mb-4">
                            <input type="text" class="form-control input-lg" name="username" aria-describedby="emailHelp" placeholder="Username">
                        </div>
                        <div class="form-group col-md-12 ">
                            <input type="password" class="form-control input-lg" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>
                            <p>Belum Punya Akun ?
                                <a class="text-blue" href="<?= base_url('form-registration') ?>">Daftar disini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="content-title text-center text-white">
                        <h4>HOTEL RAKACIA</h4>
                        <p>Website untuk pemesanan hotel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>