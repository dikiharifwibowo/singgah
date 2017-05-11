

    <?php $this->load->view('nav') ?> 
    <br><br>
<br>

    <!--Content-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="map" style="height: 300px; width: 1000px; margin: 0 auto;"></div>      
            </div>
        </div>
    <br>
    <br>
    <br>
        <div class="row">
        <?php foreach ($filter as $data): ?>
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
<script>

      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          scrollwheel: false,
          center: {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>}
        });

        setMarkers(map);
      }

      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var beaches = [
      <?php foreach ($filter as $key): ?>
          ["<?php echo $key['nama'] ?>", <?php echo $key['latitude'] ?>, <?php echo $key['longitude'] ?>],
      <?php endforeach ?>
       
      ];

      function setMarkers(map) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var locations = JSON.parse('<?php echo json_encode($map) ?>');
        var infowindow = new google.maps.InfoWindow();

        for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            title: beach[0],
          
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

 