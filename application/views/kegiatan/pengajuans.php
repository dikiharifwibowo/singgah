

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KEGIATAN
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('camp/add') ?>"><i class="material-icons">add_circle</i>Tambah Barang</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="10%">Foto</th>
                                        <th width="10%">Judul</th>
                                        <th width="20%">Isi</th>
                                        <th width="10%">tanggal</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="10%">Foto</th>
                                        <th width="10%">Judul</th>
                                        <th width="20%">Isi</th>
                                        <th width="10%">tanggal</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                       <td><?php echo $data['id'] ?></td>
                                       <td><img style="width: 60px; height: 60px;" src="<?php echo site_url("assets/img/kegiatan/{$data['foto']}"); ?>"></td>
                                       <td><?php echo $data['judul'] ?></td>
                                       <td><?php echo substr($data['deskripsi'],0,100)  ?></td>
                                       <td><?php echo $data['tanggal'] ?></td>
                                       <td><?php echo $data['status'] ?></td>                                       
                                        <td>
                                           <a href="<?php echo site_url("kegiatan/acc/{$data['id']}") ?>" class="btn btn-primary waves-effect">ACC</a> &nbsp || &nbsp <a href="<?php echo site_url("kegiatan/reject/{$data['id']}") ?>" class="btn btn-primary waves-effect">REJECT</a>
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
