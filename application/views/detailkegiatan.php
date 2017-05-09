

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
                        <div class="col-lg-7">
                        <p class="card-text" style="margin: 9px;">
                            <div id="map" style="height: 300px; width: 620px;"></div>   
                        </p>
                        <p class="card-text" style="margin: 9px;">
                               "<?php echo $datas->deskripsi ?>
                            </p>
                        </div>
                        <div class="col-lg-5" style="margin-top: 2px;">
                            <div class="view overlay hm-white-slight">
                                <img style="width: 500px; height: 300px;" src="<?php echo site_url("assets/img/kegiatan/$datas->foto"); ?>" class="img-fluid" alt="">     
                            </div>
                            <p class="card-text" style="margin: 9px;">
                                <br>
                                <strong>Lokasi Alamat Kegiatan <b><?php echo $datas->lokasi ?> </b></strong>
                                <br>Tanggal Kegiatan <b><?php echo $datas->tanggal ?> </b>
                                <br><a href="<?php echo site_url("welcome/detail/"); ?>" class="btn btn-info">KIRIM KEGIATAN</a>
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

 <script>
      function initMap() {
        var myLatLng = {lat: <?php echo $datas->latitude; ?>, lng: <?php echo $datas->longitude; ?>};

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
          title: '<?php echo $datas->judul; ?>'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELuqtE6zJbqaAfaQdJYDnLc72LbDrhvI&callback=initMap"
        async defer></script>