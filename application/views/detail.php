

      <!--Navbar-->

    <?php $this->load->view('nav'); ?>
    <br><br>
<br>

    <!--Content-->
    <div class="container">
    <h2 align="center">
        <?php echo $details->nama; ?>
    </h2>
    <h4 align="center"><i class="large material-icons">location_on</i><?php echo $details->alamat;?></h4>
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
                            <b><i class="material-icons">location_on</i> Alamat : <?php echo $details->alamat; ?></b><br><br>

                            <b> <i class="material-icons">call</i> Telepon : <?php echo $details->telepon; ?></b><br>
                            <b> <i class="material-icons">grade</i> : <?php echo $details->rating; ?></b><br>
                            <b> <i class="material-icons">update</i>Terakhir Update : <?php echo $details->tgl_update; ?></b><br><br>
                            <p align="center">
                                "Data dan syarat bisa berubah sewaktu-waktu"
                            </p>
                            
                            <br><a href="<?php echo site_url("welcome/detail/"); ?>" class="btn btn-info">SHARE FACEBOOK</a>
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