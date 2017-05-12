

    <section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR BOOKING 
                            </h2>
                          
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th width="5%">No Booking</th>
                                        <th width="10%">Nama</th>
                                        <th width="10%">NO KTP</th>
                                        <th width="10%">NO HP</th>
                                        <th width="10%">Tgl Booking</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                
                                    <tr>
                                        <th width="5%">No Booking</th>
                                        <th width="5%">Nama</th>
                                        <th width="10%">NO KTP</th>
                                        <th width="25%">NO HP</th>
                                        <th width="10%">Tgl Booking</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                
                                </tfoot>
                                <tbody>
                                <?php 
                                foreach ($datas as $data) { 
                                ?>   
                                    <tr>
                                        <td><?php echo $data['id'] ?></td>
                                        <td><?php echo $data['nama'] ?></td>
                                        <td><?php echo $data['noktp'] ?></td>
                                        <td><?php echo $data['nohp'] ?></td>
                                        <td><?php echo $data['tglbooking'] ?></td>
                                        <td>
                                           <a href="<?php echo site_url("singgah/sms/{$data['id']}") ?>" class="waves-effect"><i class="material-icons col-light-blue">message</i></a>
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
