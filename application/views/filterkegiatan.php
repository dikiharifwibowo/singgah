

    <?php $this->load->view('nav') ?> 
    <br><br>
<br>
    <!--Content-->
    <div class="container">
    <h4 align="center"> <i class="material-icons">location_on</i>  SMILE-GO</h4>
    <br> 
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <div class="row" >
                        <div class="col-lg-6" style=" margin: 0 auto;">
                            <p align="center" style="margin: 9px; ">
                            <form action="<?php echo site_url('welcome/filterkegiatan'); ?>" method="POST" enctype="multipart/form-data">                          
                                  <input type="text" name="search" class="form-control" required placeholder="Search here" style="white-space: nowrap;">
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

                        <img style="width: 260px; height: 200px;" src="<?php echo site_url("assets/img/kegiatan/$data->foto"); ?>" class="img-fluid" alt="">

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block" style="height: 185px;">
                        <!--Text-->
                        <h6 class="card-title"><strong><b> <?php echo  substr(strip_tags($data->judul),0,50); ?></b></strong></h6>
                        <p class="card-text"><?php echo  substr(strip_tags($data->deskripsi),0,50);  ?></p>

                        <a href="<?php echo site_url("welcome/kegiatandet/$data->id"); ?>" class="btn btn-info">DONASI</a>

                    </div>
                    <!--/.Card content-->
                </div>
            </div>  
            <?php endforeach ?>          
        </div>
        <br>
        <ul class="pagination pagination-lg">
          <li><?php 
            echo $this->pagination->create_links();
            ?></li>
        </ul>
    </div>
    <!--Footer-->
