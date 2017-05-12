



    <?php $this->load->view('nav') ?> 

    <br><br>

<br>

    <!--Content-->

    <div class="container">

    <h4 align="center"> <i class="material-icons">book</i> EDUCATE-GO</h4>

    <br> 

        <div class="row">

            <!--Second columnn-->

            <div class="col-lg-12">

                <!--Card-->

                <div class="card">

                    <div class="row" >

                        <div class="col-lg-6" style=" margin: 0 auto;">

                            <p align="center" style="margin: 9px; ">

                            <form action="<?php echo site_url('welcome/filterartikel'); ?>" method="POST" enctype="multipart/form-data">                          

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

            <?php

            $no = $this->uri->segment('3') + 1;

            foreach ($filter as $key): ?>

            <div class="col-lg-3" style="margin-top: 20px;">

                <!--Card-->

                <div class="card" style="height: 500px;"> 



                    <!--Card image-->

                    <div class="view overlay hm-white-slight">

                        <img src="<?php echo site_url("assets/img/artikel/$key->foto") ?>" class="img-fluid" alt="" style="height: 200px; width: 100%;" >

                        <a href="#">

                            <div class="mask"></div>

                        </a>

                    </div>

                    <!--/.Card image-->



                    <!--Card content-->

                    <div class="card-block">

                        <!--Title-->

                        <h4 class="card-title"><?php echo  substr(strip_tags($key->judul),0,50)?></h4>

                        <!--Text-->

                        <p class="card-text"><?php echo substr(strip_tags($key->isi),0,100) ?></p>

                        <a href="<?php echo site_url("welcome/artikel/$key->id") ?>" class="btn btn-info">Read more</a>

                    </div>

                    <!--/.Card content-->



                </div>

                <!--/.Card-->

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

