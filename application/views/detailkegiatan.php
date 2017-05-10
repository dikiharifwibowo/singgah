

    <!--Navbar-->
    <?php $this->load->view('nav'); ?>
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
                                <strong><i class="material-icons">location_on</i> Lokasi Alamat Kegiatan <b><?php echo $datas->lokasi ?> </b></strong>
                                <br><i class="material-icons">date_range</i> Tanggal Kegiatan <b><?php echo $datas->tanggal ?> </b>
                                <br><a href="<?php echo site_url("welcome/detail/"); ?>" class="btn btn-info">HADIRI KEGIATAN</a>
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