    <!--Navbar-->
    <?php $this->load->view('nav'); ?> 
    <!--/.Navbar-->
    <br><br>
<br>

    <!--Content-->
    <div class="container">
    <h4 align="center">BOOKING RUMAH SINGGAH </h4>
    <br> 
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <div class="row"  >
                        <div class="col-lg-6" style=" margin: 0 auto;">
                        <p align="center" class="card-text" style="margin: 9px; ">
                            <form action="<?php echo site_url('welcome/doaddbooking'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden"  readonly class="form-control" name="rumah" required placeholder="" value="<?php echo $id ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p><I><strong> Masukkan Nama </strong></I></p>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" required placeholder="Elsa diah permata sari">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p><I><strong>Masukkan No KTP</strong> </I></p>
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="noktp" required placeholder="2450088732327">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p><I><strong>Masukkan No HP </strong> </I></p>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nohp" required placeholder="082328722687">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p><I><strong>Masukkan Email </strong> </I></p>
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" required placeholder="else@amikom.ac.id">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                <p><I><strong>Masukkan Tanggal Booking </strong></I></p>
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="tglbooking" required>
                                    </div>
                                </div>
                                <input type="submit" name="simpan" class="btn btn-info">
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
</div>