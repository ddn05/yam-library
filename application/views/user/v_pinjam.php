
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YAM LIBRARY - LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-3">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h3 text-gray-900"><strong>Selamat Datang</strong></h1>
                            <h1 class="h6 text-gray-900 mb-4">Mila Siti Nurjanah</h1>
                        </div>
                        
                        <?php
                        if(isset($_GET['pesan'])){
                            if($_GET['pesan'] == "gagal"){
                                echo "<div class='alert alert-danger'>Login Gagal !</div>";
                            }
                            if($_GET['pesan'] == "logout"){
                                echo "<div class='alert alert-warning'>Anda telah Logout</div>";
                            }
                            if($_GET['pesan'] == "belumlogin"){
                                echo "<div class='alert alert-success'>Anda belum login</div>";
                            }
                        } ?>
                    <section class="mb-6">
                        <form class="user" method="post" action="<?php echo base_url()?>user/login">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="kode" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Input Kode Buku">
                                    <?php echo form_error('kode')?>
                                </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Checkout</button>
                        </form>
                    </section>
                    
                    <br>
                    <section class="mb-3">
                        <br>
                        <h1 class="h6 text-gray-900"><strong>Buku yang dipinjam :</strong></h1>
                        <ol>
                            <li>Menjadi Insan Cendikia (21/12/2020)-(22/12/2021)</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                        </ol>
                    </section>
                    
                    <br>
                    <section class="mb-3">
                        <h1 class="h6 text-gray-900"><strong>Buku yang melebihi dedline :</strong></h1>
                        <ol>
                            <li>Menjadi Insan Cendikia (21/12/2020)-(22/12/2021)</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                        </ol>
                    </section>

                    <br>
                    <section class="mb-3">
                        <h1 class="h6 text-gray-900"><strong>Buku yang sudah dikembalikan :</strong></h1>
                        <ol>
                            <li>Menjadi Insan Cendikia (21/12/2020)-(22/12/2021)</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                            <li>Menjadi Insan Cendikia</li>
                        </ol>
                    </section>
                    <br>
                    <section class="text-center">
                        <a href="" class="text-center">Ganti Password</a>
                    </section>
                    </div>
                </div>
                </div>
            </div>

        </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>