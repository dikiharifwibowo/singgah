

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" datas-toggle="collapse" datas-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('welcome');?>">
                <strong>Rumah Singgah</strong>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link">Daftarkan Rumah Singgah || Free</a>
                    </li>
                    <li class="nav-item">
                         <a href="<?php echo site_url('auth'); ?>" class="nav-link">Login User</a>
                    </li>
                </ul>
                <!-- <form class="form-inline waves-effect waves-light">
                    <input class="form-control" type="text" placeholder="Search">
                </form> -->
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
    <br><br>
<br>

    <!--Content-->
    <div class="container">
    <h4 align="center"><?php echo $datas->judul;?></h4>
    <br> 
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <!--Card image-->
                    <div class="row">
                        <div class="col-lg-6">
                        <p class="card-text" style="margin: 9px;">
                            <iframe width="520" height="300" src="http://www.youtube.com/embed/dP15zlyra3c?html5=1"></iframe>
                        </p>
                        <p class="card-text" style="margin: 9px;">
                               "<?php echo $datas->deskripsi ?>
                            </p>
                        </div>
                        <div class="col-lg-6" style="margin-top: 20px;">
                            <div class="view overlay hm-white-slight">
                                <img style="width: 500px; height: 300px;" src="<?php echo site_url("assets/img/donasi/$datas->foto"); ?>" class="img-fluid" alt="">     
                            </div>
                            <p class="card-text" style="margin: 9px;">
                                <br>
                                <h4><b> Rp. <?php echo $datas->targetdana ?> </b></h4><br>
                                <strong>terkumpul dari target <b>Rp. <?php echo $datas->terkumpul ?> </b></strong>
                                <br>Galang dana sebelum <b><?php echo $datas->dateline ?> </b>
                                <br><a href="<?php echo site_url("welcome/detail/"); ?>" class="btn btn-info">KIRIM DONASI</a>
                                <br><a href="<?php echo site_url("welcome/detail/"); ?>" class="btn btn-info">SHARE FACEBOOK</a>
                            </p>
                        </div>
                        
                    </div>
                    <!--/.Card image-->

                  <!-- -->
                </div>
                <!--/.Card-->
            </div>
        </div>
    <!--Footer-->
    </div>

