

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA DONASI
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="10%">Foto</th>
                                        <th width="10%">Judul</th>
                                        <th width="15%">Isi</th>
                                        <th width="15%">tanggal</th>
                                        <th width="15%">Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="10%">Foto</th>
                                        <th width="10%">Judul</th>
                                        <th width="15%">Isi</th>
                                        <th width="15%">tanggal</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                       <td><?php echo $data['id'] ?></td>
                                       <td><img style="width: 60px; height: 60px;" src="<?php echo site_url("assets/img/donasi/{$data['foto']}"); ?>"></td>
                                       <td><?php echo $data['judul'] ?></td>
                                       <td><?php echo substr($data['deskripsi'],0,100)  ?></td>
                                       <td><?php echo $data['tanggal'] ?></td>
                                       <td>
                                           <a href="<?php echo site_url("user/deldonasi/{$data['id']}") ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"> <i class="material-icons" >delete</i> </a>
                                           <a href="<?php echo site_url("user/editdonasi/{$data['id']}") ?>"> <i class="material-icons" >edit</i> </a>
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
