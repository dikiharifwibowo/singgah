<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <title>AMICTA || Rumah Singgah </title>



    <!-- Font Awesome -->

    <link rel="stylesheet" href="<?php echo site_url('assets/css/font-awesome.min.css'); ?>">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->

    <link href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">



    <!-- Material Design Bootstrap -->

    <link href="<?php echo site_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo site_url('assets/img/favicon.ico') ?>">



    <!-- Template styles -->

    <style rel="stylesheet">

        /* TEMPLATE STYLES */

        /* Necessary for full page carousel*/

        

        html,

        body {

            height: 100%;

        }

        /* Navigation*/

        

        .navbar {

            background-color: transparent;

        }

        

        .top-nav-collapse {

            background-color: #304a74;

        }

        

        footer.page-footer {

            background-color: #304a74;

        }

        

        @media only screen and (max-width: 768px) {

            .navbar {

                background-color: #4285F4;

            }

        }

        

        .scrolling-navbar {

            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;

            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;

            transition: background .5s ease-in-out, padding .5s ease-in-out;

        }

        /* Carousel*/

        

        .carousel {

            height: 50%;

        }

        

        @media (max-width: 776px) {

            .carousel {

                height: 100%;

            }

        }

        

        .carousel-item,

        .active {

            height: 100%;

        }

        

        .carousel-inner {

            height: 100%;

        }

        

        /*Caption*/

        

        .flex-center {

            color: #fff;

        }



        #waves-effect {

            position: relative;

            cursor: pointer;

            overflow: hidden;

            -webkit-user-select: none;

            -moz-user-select: none;

            -ms-user-select: none;

            user-select: none;

            z-index: 1;

        }



        .btn {

            display: inline-block;

            font-weight: 400;

            line-height: 1.25;

            text-align: center;

            white-space: nowrap;

            vertical-align: middle;

            -webkit-user-select: none;

            -moz-user-select: none;

            -ms-user-select: none;

            user-select: none;

            border: 1px solid transparent;

            padding: .5rem 1rem;

            font-size: 1rem;

            border-radius: .25rem;

            -webkit-transition: all .2s ease-in-out;

            -o-transition: all .2s ease-in-out;

            transition: all .2s ease-in-out;

        }

    </style>



</head>



<body>





    <!--Navbar-->

    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">

        <div class="container">

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <a class="navbar-brand" href="#">

                <strong>Rumah Singgah</strong>

            </a>

            <div class="collapse navbar-collapse" id="navbarNav1">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo site_url('welcome/filterdonasi') ?>" class="nav-link">Galang-Go</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('welcome/filterkegiatan') ?>" class="nav-link">Smile-Go</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('user/add') ?>" class="nav-link">Daftarkan Rumah Singgah || Free</a>
                    </li>
                    <?php if ($this->ion_auth->logged_in()): ?>
                    <li class="nav-item dropdown btn-group">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong><b><?php echo $_SESSION['identity'] ?></b></strong> </a>
                        <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">Logout</a>
                            <a class="dropdown-item" href="<?php echo site_url('user') ?>">Dashboard</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">

                        <a href="<?php echo site_url('auth'); ?>" class="nav-link">Login</a>

                    </li>
                    <?php endif ?>
                </ul>

            </div>

        </div>

    </nav>

    <!--/.Navbar-->



    <!--Carousel Wrapper-->

    <div id="carousel-example-3" class="carousel slide carousel-fade white-text" data-ride="carousel" data-interval="false">

        <!--Indicators-->

        <ol class="carousel-indicators">

        </ol>

        <!--/.Indicators-->



        <!--Slides-->

        <div class="carousel-inner" role="listbox">



            <!-- First slide -->

            <div class="carousel-item active view hm-black-light" style="background-image: url('<?php echo site_url('assets/img/slide.jpg'); ?>'); background-repeat: no-repeat; background-size: cover;">

                

                <!-- Caption -->

                <div class="full-bg-img flex-center white-text">

                <br>

                    <ul class="animated fadeInUp col-md-12">

                        <li>

                            <h1 class="h1-responsive">Cari Rumah Singgah?</h1></li>

                        <li>

                            <p>Temukan rumah singgah, Bantu mereka, Hibur mereka, Gratis.</p>

                        </li>

                        <li>

                        <form action="<?php echo site_url('welcome/search'); ?>" method="POST">  

                        <select class="btn btn-primary">

                          <option value="peta">Cari dari Peta</option>

                          <option value="google" disabled="">Cari dari Google</option>

                        </select>&nbsp &nbsp &nbsp

                        <input placeholder="Cari Berdasarkan Lokasi Di Sini" type="text" name="nama" class="validate" style="width: 180px; text-align: left;">

                        <button class="waves-effect waves-light btn red" type="submit" name="submit">

                           <i class="large material-icons">search</i>Cari

                        </button>

                        </form>

                        </li>

                    </ul>

                </div>

                <!-- /.Caption -->

                

            </div>



        </div>

        <!--/.Slides-->



        <!--Controls-->

        <!-- c -->

        <!--/.Controls-->

    </div>

    <!--/.Carousel Wrapper-->



    <br>



    <!--Content-->

    <div class="container">

    <h2 align="center">Rekomendasi Rumah Singgah</h2>
    <p class="card-text" align="center" style="color: #5bc0de;"><strong> Temukan Rumah Singgah untuk pengobatanmu</strong></p>
    <br> 

        <div class="row">

           <?php foreach ($rec_rumah as $data): ?>

            <!--Second columnn-->

            <div class="col-lg-3">

                <!--Card-->

                <div class="card">

             

                    <!--Card image-->

                    <div class="view overlay hm-white-slight">

                        <img style="width: 260px; height: 200px;" src="<?php echo site_url("assets/img/rumah/{$data['foto']}"); ?>" class="img-fluid" alt="">

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>

                    <!--/.Card image-->



                    <!--Card content-->

                    <div class="card-block" style="height: 185px;">

                        <!--Title-->

                        <h6 class="card-title"><?php echo $data['nama']; ?></h6>

                        <!--Text-->

                        <p class="card-text"><?php echo substr($data['alamat'],0,50);  ?></p>

                        <a href="<?php echo site_url("welcome/detail/{$data['id']}"); ?>" class="btn btn-info">SINGGAH</a>

                    </div>

                    <!--/.Card content-->

               

                </div>

                <!--/.Card-->

            </div>

             <?php endforeach ?>

        </div>



        <div class="row">

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/bali.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/bali"); ?>">

                                <h2 align="center">Bali</h2>

                            </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/bandung.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/bandung"); ?>">

                                <h2 align="center">Bandung</h2>

                            </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/surabaya.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/surabaya"); ?>">

                                <h2 align="center">Surabaya</h2>

                            </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/jogja.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/jogja"); ?>">

                                <h2 align="center">Jogja</h2>

                            </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/jakarta.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/jakarta"); ?>">

                                <h2 align="center">Jakarta</h2>

                            </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-2" style="margin-top: 20px;">

                <div class="card">

                    <div class="view overlay hm-white-slight">

                            <img src="<?php echo site_url("assets/img/semarang.jpg"); ?>" class="img-fluid" alt="" >

                            <a href="<?php echo site_url("welcome/filter/semarang"); ?>">

                                <h2 align="center">Semarang</h2>

                            </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--/.Content-->
    <div class="container">
    <hr>
    <h2 align="center">BANTU MEREKA</h2>
    <p class="card-text" align="center" style="color: #5bc0de;"><strong>Uluran tangan anda sangat berarti mereka, mari bantu mereka</strong></p>
    <hr>
        <div class="row">
            <?php foreach ($donasi as $data): ?>
            <div class="col-lg-3" >
                <div class="card">
                    <!--Card image-->
                    <div class="view overlay hm-white-slight">

                        <img style="width: 260px; height: 200px;" src="<?php echo site_url("assets/img/donasi/{$data['foto']}"); ?>" class="img-fluid" alt="">

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block" style="height: 185px;">
                        <!--Text-->

                        <p class="card-text"><?php echo substr($data['deskripsi'],0,50);  ?></p>

                        <a href="<?php echo site_url("welcome/donasidet/{$data['id']}"); ?>" class="btn btn-info">DONASI</a>

                    </div>
                    <!--/.Card content-->
                </div>
            </div>  
            <?php endforeach ?>          
        </div>
    </div>

    <!--/.Content-->
    <div class="container">
    <hr>
    <h2 align="center">HIBUR MEREKA</h2>
    <p class="card-text" style="color: #5bc0de;" align="center"><strong>Kebahagiaan adalah hak bagi sesama manusia, namun kanker telah menghilangkan sebagian harapan meraka, hibur dan kuatkan mereka</strong></p>
    <hr>
        <div class="row">
            <?php foreach ($kegiatan as $data): ?>
            <div class="col-lg-3">
                <div class="card">
                    <!--Card image-->
                    <div class="view overlay hm-white-slight">

                        <img style="width: 260px; height: 200px;" src="<?php echo site_url("assets/img/kegiatan/{$data['foto']}"); ?>" class="img-fluid" alt="">

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block" style="height: 185px;">

                        <!--Title-->

                        <h6 class="card-title"><?php echo $data['judul']; ?></h6>

                        <!--Text-->

                        <p class="card-text"><?php echo substr($data['deskripsi'],0,50);  ?></p>

                        <a href="<?php echo site_url("welcome/kegiatandet/{$data['id']}"); ?>" class="btn btn-info">IKUTI</a>

                    </div>
                    <!--/.Card content-->
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <!--Footer-->

    <footer class="page-footer center-on-small-only">



        <!--Footer Links-->

        <div class="container-fluid">

            <div class="row">



                <!--First column-->

                <div class="col-lg-3 offset-lg-1 hidden-lg-down">

                    <h5 class="title">TENTANG RUMAH SINGGAH</h5>

                    <p>Rumah Singgah membantu kamu untuk mendapatkan singgahan gratis, di peruntukan untuk kamu yang ingin berobat dan butuh rumah singgahan </p>



                    <p>"Barang siapa yang membantu sesama, sesungguhnya Tuhan maha pembalasan kebaikan</p>

                </div>

                <!--/.First column-->



                <hr class="hidden-md-up">



                <!--Second column-->

                <div class="col-lg-4 col-md-4 offset-lg-1">

                    <h5 class="title">Suported By : </h5>

                    &nbsp&nbsp&nbsp&nbsp&nbsp<img style="height: 80px; width: 100px;" src="<?php echo site_url('assets/img/amcc-logo.png') ?>">

                    &nbsp&nbsp&nbsp&nbsp<img style="height: 80px; width: 180px;" src="<?php echo site_url('assets/img/amikom.png') ?>"> <br>

                    &nbsp&nbsp&nbsp&nbsp<img style="height: 120px; width: 100px;" src="<?php echo site_url('assets/img/JDV-logo.png') ?>">

                    &nbsp&nbsp&nbsp&nbsp<img style="height: 120px; width: 180px;" src="<?php echo site_url('assets/img/kemenkes.jpg') ?>"> <br>

                   

                </div>

                <!--/.Third column-->



                <hr class="hidden-md-up">



                <!--Fourth column-->

                <div class="col-lg-2 col-md-4">

                    <h5 class="title">Follow me on</h5>

                    <ul>

                        <li><a href="#!"><img width="30" height="30" src="<?php echo site_url('assets/img/fb.png') ?>"> singgah</a></li>

                        <li><a href="#!"><img width="30" height="30" src="<?php echo site_url('assets/img/inst.png') ?>"> singgah</a></li>

                        <li><a href="#!"><img width="30" height="30" src="<?php echo site_url('assets/img/tw.png') ?>"> singgah</a></li>
                        
                    </ul>

                </div>

                <!--/.Fourth column-->



            </div>

        </div>

        <!--/.Footer Links-->



        <hr>







        <!--Copyright-->

        <div class="footer-copyright">

            <div class="container-fluid">

                © 2017 Copyright: <a href="#" rel="nofollow">  Dikih Arif Wibowo || Elsa Diah </a>



            </div>

        </div>

        <!--/.Copyright-->



    </footer>

    <!--/.Footer-->





    <!-- SCRIPTS -->



    <!-- JQuery -->

    <script type="text/javascript" src="<?php echo site_url('assets/js/jquery-2.2.3.min.js'); ?>"></script>



    <!-- Bootstrap tooltips -->

    <script type="text/javascript" src="<?php echo site_url('assets/js/tether.min.js'); ?>"></script>



    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.min.js'); ?>"></script>



    <!-- MDB core JavaScript -->

    <script type="text/javascript" src="<?php echo site_url('assets/js/mdb.min.js'); ?>"></script>





</body>



</html>