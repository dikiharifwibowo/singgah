

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
    <h2 align="center">
        <?php echo $details->nama; ?>
    </h2>
    <h4 align="center"><?php echo $details->alamat;?></h4>
    <br>
    <br>
    
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <!--Card image-->
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="view overlay hm-white-slight">
                                <img style="width: 500px; height: 300px;" src="<?php echo site_url("assets/img/rumah/$details->foto"); ?>" class="img-fluid" alt="">     
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div id="map" style="height: 300px; width: 620px;"></div>      
                        </div>
                        <hr><br>
                        <div class="col-lg-8" style="margin-top: 20px;">
                            <p class="card-text" style="margin: 9px;">
                                <?php echo $details->isi; ?>
                            </p>
                        </div>
                        <div class="col-lg-4" style="margin-top: 20px;">
                            <b>Provinsi : <?php echo $details->provinsi; ?></b><br>
                            <b>Kota : <?php echo $details->kota; ?></b><br><br>

                            <b>Telepon : <?php echo $details->telepon; ?></b><br>
                            <b>rating : <?php echo $details->rating; ?></b><br>
                            <b>Terakhir Update : <?php echo $details->tgl_update; ?></b><br><br>
                            <p align="center">
                                "Data dan syarat bisa berubah sewaktu-waktu"
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
 <script>
      function initMap() {
        var myLatLng = {lat: <?php echo $details->latitude; ?>, lng: <?php echo $details->longitude; ?>};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: false,
          zoom: 13
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: '<?php echo $details->nama; ?>'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELuqtE6zJbqaAfaQdJYDnLc72LbDrhvI&callback=initMap"
        async defer></script>