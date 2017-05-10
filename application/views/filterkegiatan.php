

    <?php $this->load->view('nav') ?> 
    <br><br>
<br>
    <!--Content-->
    <div class="container">
    <h4 align="center">SMILE-GO</h4>
    <br> 
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <div class="row" >
                        <div class="col-lg-6" style=" margin: 0 auto;">
                            <p align="center" style="margin: 9px; ">
                            <form action="<?php echo site_url('user/doaddkirimdonasi'); ?>" method="POST" enctype="multipart/form-data">                          
                                  <input type="text" name="jumlah" class="form-control" required placeholder="Search here" style="white-space: nowrap;"><i style="white-space: nowrap;" class="material-icons">search</i>Cari
                            </form>
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
</div>
<br>
</div>
    <!--Content-->
    <div class="container">     
      <div class="row">
            <?php foreach ($filter as $data): ?>
            <div class="col-lg-3" >
                <div class="card">
                    <!--Card image-->
                    <div class="view overlay hm-white-slight">

                        <img style="width: 260px; height: 200px;" src="<?php echo site_url("assets/img/donasi/{$data['foto']}"); ?>" class="img-fluid" alt="">

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block" style="height: 185px;">
                        <!--Text-->

                        <p class="card-text"><?php echo substr($data['deskripsi'],0,50);  ?></p>

                        <a href="<?php echo site_url("welcome/donasidet/{$data['id']}"); ?>" class="btn btn-info">DONASI</a>

                    </div>
                    <!--/.Card content-->
                </div>
            </div>  
            <?php endforeach ?>          
        </div>
    </div>
    <!--Footer-->
