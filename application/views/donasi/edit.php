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
                            <h2>EDIT donasi</h2>
                        </div>
                        <div class="body">
                            <form action="<?php echo site_url('donasi/doedit'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users" required value="<?php echo $_SESSION['identity'] ?>" readonly>
                                     
                                    </div>
                                    <div class="help-info">It's Yours. Read Only</div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="text" class="form-control" value="<?php echo $id ?>" name="id" required readonly >
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="file" class="form-control" name="foto" required >
                                    </div>
                                    <div class="help-info">foto donasi</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="text" class="form-control" name="youtube" value="<?php echo $youtube ?>" placeholder="http://www.youtube.com/embed/dP15zlyra3c">
                                    </div>
                                    <div class="help-info">Optional : Link Youtube</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="number" class="form-control" name="targetdana" required value="<?php echo $targetdana ?>" placeholder="500.000.000" required="">
                                    </div>
                                    <div class="help-info">Target Dana Terkumpul</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <input type="date" class="form-control" name="dateline" value="<?php echo $dateline ?>" required >
                                    </div>
                                    <div class="help-info">DateLine dana terkumpul</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="<?php echo $judul ?>" name="judul" required placeholder="Example : Galang dana untuk adik Fitri">
                                    </div>
                                    <div class="help-info">Nama donasi</div>
                                </div>
                              <!--   <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="datetime-local" class="form-control" name="tanggal" required placeholder="tanggal donasi">
                                    </div>
                                    <div class="help-info">Tanggal donasi</div>
                                </div> -->
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                        <textarea id="ckeditor" name="deskripsi" type="text" required="" class="form-control" placeholder="deskripsi donasi"><?php echo $deskripsi ?>"</textarea>
                                    </div>
                                    <div class="help-info">Deskripsi donasi</div>
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