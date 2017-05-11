

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA BERITA
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="20%">Judul</th>
                                        <th width="5%">Foto</th>
                                        <th width="20%">Isi</th>
                                        <th width="10%">Tgl Buat</th>
                                        <th width="10%">Status</th>
                                        <th width="18%">Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="20%">Judul</th>
                                        <th width="5%">Foto</th>
                                        <th width="20%">Isi</th>
                                        <th width="10%">Tgl Buat</th>
                                        <th width="10%">Status</th>
                                        <th width="18%">Action</th> 
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                       <td><?php echo $data['id'] ?></td>
                                       <td><?php echo $data['judul'] ?></td>
                                       <td><img style="width: 60px; height: 60px;" src="<?php echo site_url("assets/img/artikel/{$data['foto']}"); ?>"></td>
                                       <td><?php echo substr($data['isi'],0,100)  ?></td>
                                       <td><?php echo $data['tglbuat'] ?></td>
                                       <td><?php echo $data['status'] ?></td>
                                        <td>
                                           <a href="<?php echo site_url("artikel/acc/{$data['id']}") ?>" class="btn btn-primary waves-effect">ACC</a> &nbsp || &nbsp <a href="<?php echo site_url("artikel/reject/{$data['id']}") ?>" class="btn btn-primary waves-effect">REJECT</a>
                                       </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
