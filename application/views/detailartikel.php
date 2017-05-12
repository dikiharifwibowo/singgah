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
                           <img style="width: 100%; height: 300px;" src="<?php echo site_url("assets/img/artikel/$datas->foto"); ?>" class="img-fluid" alt=""> 
                        </p>
                        <p class="card-text" style="margin: 9px;">
                               "<?php echo $datas->isi ?>
                            </p>
                        </div>
                        <div class="col-lg-5" style="margin-top: 20px;">
                            <p class="card-text" style="margin: 9px;">
                                <br>
                                <i class="material-icons">perm_identity</i> Penulis : <b> <?php echo $datas->first_name ?> <?php echo $datas->last_name ?> </b>
                                <br><i class="material-icons">date_range</i><b> <?php echo $datas->tglbuat ?> </b>
                                <br>
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

