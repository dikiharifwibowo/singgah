

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORY TRANSAKSI DONASI
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
                                        <th width="5%">ID DONASI</th>
                                        <th width="10%">Jumlah</th>
                                        <th width="10%">Via</th>
                                        <th width="10%">Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width="5%">ID DONASI</th>
                                        <th width="10%">Jumlah</th>
                                        <th width="10%">Via</th>
                                        <th width="10%">Status</th>
                                    </tr>
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                       <td><?php echo $data['donasi'] ?></td>
                                       <td><?php echo $data['jumlah'] ?></td>
                                       <td><?php echo $data['via'] ?></td>
                                       <td><?php echo $data['status'] ?></td>
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
