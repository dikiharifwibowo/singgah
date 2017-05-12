    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KIRIM SMS </h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SMS
                                <small>Perhatikan dengan seksama</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form action="<?php echo site_url('user/dosms') ?>" method="post">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required="" readonly="" name="nama" value="<?php echo $data->nama; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required="" readonly="" name="noktp" value="<?php echo $data->noktp; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" required="" readonly="" name="nohp" value="<?php echo $data->nohp; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" required="" placeholder="isi sms" name="pesan"></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                            <input type="submit" name="simpan" value="Kirim" class="btn btn-primary waves-effect" align="center">
                                    </div>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
    </section>