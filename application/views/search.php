

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="row">
            <div class="col-lg-12"> 
            <p align="center">
                <img src="<?php echo site_url('assets/img/banner.jpg'); ?>" style="height: 300px; width: 1000px; margin: 0 auto;">
            </p>   
            </div>
        </div>
    <br>
    <br>
    <br>
        <div class="row">
        <?php foreach ($search as $data): ?>
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
                    <div class="card-block">
                        <!--Title-->
                        <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                        <!--Text-->
                        <p class="card-text"><?php echo substr($data['alamat'],0,100);  ?></p>
                        <a href="<?php echo site_url("welcome/detail/{$data['id']}"); ?>" class="btn btn-info">SINGGAH</a>
                    </div>
                    <!--/.Card content-->
               
                </div>
                <!--/.Card-->
            </div>
        <?php endforeach ?>
        </div>
    </div>
    <!--Footer-->