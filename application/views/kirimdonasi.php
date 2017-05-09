

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" datas-toggle="collapse" datas-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
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
    <h4 align="center">FORM KIRIM DONASI</h4>
    <br> 
        <div class="row">
            <!--Second columnn-->
            <div class="col-lg-12">
                <!--Card-->
                <div class="card">
                    <div class="row"  >
                        <div class="col-lg-6" style=" margin: 0 auto;">
                        <p align="center" class="card-text" style="margin: 9px; ">
                            <form action="<?php echo site_url('user/doaddkirimdonasi'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" class="form-control" name="id" required value="<?php echo $kode ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" class="form-control" name="donasi" required placeholder="" value="<?php echo $donasi ?>">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <p><I>Masukkan Nominal Donasi</I></p>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="jumlah" required placeholder="Rp. 5.000.000">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                 <p><I>Pilih jenis Pembayaran</I></p>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                                <select name="via" class="form-control show-tick" >
                                                    <option value="transfer">Transfer Bank</option>
                                                    <option value="paypal">Paypal</option>
                                                </select>
                                        </div>
                                </div>
                                <div class="form-group form-float">
                                 <p><I>Jika Transfer Pilih Bank di bawah</I></p>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                                <select name="bank" class="form-control show-tick" >
                                                    <option value="mandiri">Mandiri</option>
                                                    <option value="muamalat">Muamalat</option>
                                                </select>
                                             <p class="card-text">Mandiri <strong>8977222999</strong><br>Muamalat <strong>8977222999</strong></p>
                                        </div>

                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="rekening" required placeholder="Rekening kamu">
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