

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR RUMAH SINGGAH 
                            </h2>
                          
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">No ID</th>
                                        <th width="5%">Nama</th>
                                        <th width="10%">Rumah</th>
                                        <th width="25%">Alamat</th>
                                        <th width="10%">Kota</th>
                                        <th width="10%">Telepon</th>
                                        <th width="5%">Status</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                
                                    <tr>
                                        <th width="5%">No ID</th>
                                        <th width="5%">Nama</th>
                                        <th width="10%">Rumah</th>
                                        <th width="25%">Alamat</th>
                                        <th width="10%">Kota</th>
                                        <th width="10%">Telepon</th>
                                        <th width="5%">Status</th>
                                        <th width="25%">Action</th>
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['first_name'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                        <td><?php echo $data['kota'] ?></td>
                                        <td><?php echo $data['telepon'] ?></td>
                                        <td><?php echo $data['status'] ?></td>
                                        <td>
                                           <a href="<?php echo site_url("admin/acc/{$data['id']}") ?>" class="btn btn-primary waves-effect">ACC</a> &nbsp || &nbsp <a href="<?php echo site_url("admin/reject/{$data['id']}") ?>" class="btn btn-primary waves-effect">REJECT</a>
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
