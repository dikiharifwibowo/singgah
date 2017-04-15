

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
          center: {lat: -6.186486, lng: 106.834091}
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
        
        for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            title: beach[0],
          
          });
        }
      }
    </script>

        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAELuqtE6zJbqaAfaQdJYDnLc72LbDrhvI&callback=initMap">
    </script>