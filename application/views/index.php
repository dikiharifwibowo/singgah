<?php $this->load->view('header') ?>
<?php $this->load->view('nav') ?>
<div id="map" style="height: 500px; width: 100%; margin: 0 auto;"></div>      
    <br>
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

                        <h6 class="card-title"><strong><b> <?php echo $data['nama']; ?></b></strong></h6>

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
                        <h6 class="card-title"><strong><b> <?php echo $data['judul']; ?></b></strong></h6>
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

                       <h6 class="card-title"><strong><b> <?php echo $data['judul']; ?></b></strong></h6>

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


<script type="text/javascript">
    function initMap() {

    var locations = JSON.parse('<?php echo json_encode($map) ?>');

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      scrollwheel: false,
      center: new google.maps.LatLng(-2.5, 118),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i].latitude, locations[i].longitude),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent("<p align='center'> <a href='<?php echo site_url("welcome/detail/") ?>"+locations[i].id+"'>"+locations[i].nama+"</a> <br>"+locations[i].alamat+"</p>");        
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELuqtE6zJbqaAfaQdJYDnLc72LbDrhvI&callback=initMap"
        async defer></script>

</body>



</html>