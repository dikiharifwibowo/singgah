

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
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('singgah/add'); ?>"><i class="material-icons">add_circle</i> Tambah Rumah </a></li>   
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">No ID</th>
                                        <th width="10%">Rumah</th>
                                        <th width="15%">Alamat</th>
                                        <th width="15%">Kota</th>
                                        <th width="15%">Isi</th>
                                        <th width="15%">Telepon</th>
                                        <th width="15%">Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                
                                    <tr>
                                        <th width="5%">No ID</th>
                                        <th width="10%">Rumah</th>
                                        <th width="15%">Alamat</th>
                                        <th width="15%">Kota</th>
                                        /<th width="15%">Isi</th>
                                        <th width="15%">Telepon</th>
                                        <th width="15%">Action</t
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($list as $data) { 
                                ?>   
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['alamat'] ?></td>
                                        <td><?php echo $data['kota'] ?></td>
                                        <td><?php echo substr($data['isi'],0,100)  ?></td>
                                        <td><?php echo $data['telepon'] ?></td>
                                        <td><a href="<?php echo site_url("singgah/edit/{$data['id']}"); ?>" ><i class="material-icons">edit</i></a>
                                            <a href="<?php echo site_url("singgah/delete/{$data['id']}"); ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="material-icons">delete</i></a>
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
