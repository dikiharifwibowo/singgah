

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
                            <iframe width="100%" height="350" src="http://www.youtube.com/embed/dP15zlyra3c?html5=1"></iframe>
                        </p>
                        <p class="card-text" style="margin: 9px;">
                               "<?php echo $datas->deskripsi ?>
                            </p>
                        </div>
                        <div class="col-lg-5" style="margin-top: 20px;">
                            <div class="view overlay hm-white-slight">
                                <img style="width: 500px; height: 300px;" src="<?php echo site_url("assets/img/donasi/$datas->foto"); ?>" class="img-fluid" alt="">     
                            </div>
                            <p class="card-text" style="margin: 9px;">
                                <br>
                                <h4><i class="material-icons">attach_money</i><b> Rp. <?php echo $datas->targetdana ?> </b></h4>
                                <br><i class="material-icons">monetization_on</i><strong> Terkumpul dari target <b>Rp. <?php echo $datas->terkumpul ?> </b></strong>
                                <br><i class="material-icons">date_range</i> Galang dana sebelum <b><?php echo $datas->dateline ?> </b>
                                <br><a href="<?php echo site_url("user/kirimdonasi/$datas->id"); ?>" class="btn btn-info">KIRIM DONASI</a>
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

