<style type="text/css">
.main { text-align:center; font:12pt Arial; width:100%; height:auto; }
.eventtext {width:100%; margin-top:20px; font:10pt Arial; text-align:left; line-height:25px; background-color:#EDF4F8;
padding:5px; border:1px dashed #C2DAE7;}
#mapa {width:100%; height:340px; border:5px solid #DEEBF2;}
ul {font:10pt arial; margin-left:0px; padding:5px;}
li {margin-left:0px; padding:5px; list-style-type:decimal;}
.code {border:1px dashed #cecece; background-color:#F7F7F7; padding:5px;}
.small {font:9pt arial; color:gray; padding:2px; }
.jimi { margin:0px;}
</style>

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH MITRA RUMAH SINGGAH</h2>
                        </div>
                        <div class="body">
                            <form action="<?php echo site_url('user/doadd'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="user" required value="<?php echo $_SESSION['identity'] ?>" readonly>
                                     
                                    </div>
                                    <div class="help-info">It's Yours. Read Only</div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="file" class="form-control" name="foto" required >
                                    </div>
                                    <div class="help-info">foto</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="rumah" required placeholder="Nama rumah">
                                    </div>
                                    <div class="help-info">Example : Rumah Singgah YKPI</div>
                                </div>
                                
                                <div class="form-group form-float"> 
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                                <select name="prov" class="form-control show-tick" >
                                                    <option value="c" disabled="">-- Provinsi --</option>
                                                    <option value="Jawa Timur">Jawa Timur</option>
                                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                                    <option  value="Jawa Barat">Jawa Barat</option>
                                                    <option value="DI Yogyakarta">DI Yogyakarta</option>
                                                    <option value="DKI Jakarta">DKI Jakarta</option>
                                                    <option value="Banten">Banten</option>
                                                    
                                                </select>
                                        </div>
                                        <div class="col-sm-6">
                                                <select name="city" class="form-control show-tick" >
                                                    <option value="surabaya">Surabaya</option>
                                                    <option value="semarang">Semarang</option>
                                                    <option value="jogja">Jogja</option>
                                                    <option value="jakarta">Jakarta</option>
                                                    <option value="bandung">Bandung</option>
                                                    <option value="bali">Bali</option>
                                                    
                                                    
                                                </select>
                                        </div>
                                    </div>
                         
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat" required >
                                        <label class="form-label">alamat</label>
                                    </div>
                                    <div class="help-info">Ex: Jln Sudirman</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="telepon" required >
                                        <label class="form-label">No Telepon</label>
                                    </div>
                                    <div class="help-info">Ex: 082328722687</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="rat">
                                                    <option value="">-- Rating --</option>
                                                    <option value="4">Empat</option>
                                                    <option value="3">tiga</option>
                                                    <option value="2">Dua</option>
                                                    <option value="1">Satu</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="help-info">Rating</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                        <textarea id="ckeditor" name="isi" type="text" required="" class="form-control" placeholder="isi"></textarea>
                                    </div>
                                    <div class="help-info">Isi</div>
                                </div>
                               <div class="form-group form-float">
                                    <div class="form-line">      
                                        <div class="main">

                                        <div style="width:70%; margin:0px auto;">
                                        <div id="mapa"></div>
                                        <div class="eventtext">
                                        <div>Lattitude: <span id="latspan"></span></div>

                                        <div>Longitude: <span id="lngspan"></span></div>
                                        <div>Lat Lng: <span id="latlong"></span></div>
                                        <div>Lat Lng on click:
                                        <input type="text" name="latitude" id="latclicked" style="width:150px; border:1px inset gray;">&nbsp <input name="longitude" type="text" id="longclicked" style="width:150px; border:1px inset gray;"></span></div>
                                        </div>
                                        </div>

                                        </div>
                                        <div style="width:70%; margin:0 auto;">
                                    </div>
                                </div>


                              <!--   <button class="btn btn-primary waves-effect" type="submit" name="simpa">SUBMIT</button> -->
                              <input type="submit" name="simpan" class="btn btn-primary waves-effect">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Ckeditor -->
    <script src="<?php echo site_url('assets/admin/'); ?>plugins/ckeditor/ckeditor.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo site_url('assets/admin/'); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo site_url('assets/admin/'); ?>js/pages/forms/editors.js"></script>
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyAELuqtE6zJbqaAfaQdJYDnLc72LbDrhvI" type="text/javascript"></script>
        <script type="text/javascript">
if (GBrowserIsCompatible()) {
    map = new GMap2(document.getElementById("mapa"));
    map.disableScrollWheelZoom();
    map.addControl(new GLargeMapControl());
    map.addControl(new GMapTypeControl(3));
    map.setCenter( new GLatLng(-6.966667, 110.416664), 14,0);

    GEvent.addListener(map,'mousemove',function(point){
    document.getElementById('latspan').innerHTML = point.lat()
    document.getElementById('lngspan').innerHTML = point.lng()
    document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()
    });

    GEvent.addListener(map,'click',function(overlay,point) {
    document.getElementById('latclicked').value = point.lat()
    document.getElementById('longclicked').value = point.lng()
    });
}

// var latc,longc;

document.addEventListener('DOMContentLoaded',function() {
    document.querySelector('select[name="city"]').onchange=updateinput;
},false);

function updateinput(event){    
    var city = event.target.value
    if (city=='semarang') {
        latc = -6.966667
        longc = 110.416664
    } else if (city=='surabaya') {
        latc = -7.257471
        longc = 112.752088
    } else if (city=='bali') {
        latc = -8.409517
        longc = 115.188916
    } else if (city=='bandung') {
        latc = -6.917463
        longc = 107.619122
    } else if (city=='jakarta') {
        latc = -6.186486
        longc = 106.834091
    } else {
        latc = -7.797457
        longc = 110.370697
    }
    map.setCenter( new GLatLng(latc, longc), 14,0);
}

</script>
    