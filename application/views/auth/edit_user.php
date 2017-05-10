<?php 
    $this->load->view('admin/header','refresh');
    $this->load->view('admin/nav','refresh');
    $this->load->view('admin/sidebar','refresh');
?>

    <section class="content">
        <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>EDIT USER</h2>
                        </div>
                        <div class="body">
                        <?php   $userid = $this->ion_auth->get_user_id(); ?>
                            <form action="<?php echo site_url("auth/edit_user/{$userid}"); ?>" method="POST" enctype="multipart/form-data">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                      <?php echo form_input($first_name,'','class="form-control"');?>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <?php echo form_input($last_name,'','class="form-control"');?>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <?php echo form_input($company,'','class="form-control"');?>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                        <?php echo form_input($phone,'','class="form-control"');?>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <?php echo form_input($password,'','class="form-control" placeholder="password"');?>
                                    </div>
                                    <div class="help-info">isikan password jika mau di rubah</div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">      
                                       <?php echo form_input($password_confirm,'','class="form-control" placeholder="confirm password"');?>
                                    </div>
                                    <div class="help-info">confirmasi password</div>
                                </div>
                              <!--   <button class="btn btn-primary waves-effect" type="submit" name="simpa">SUBMIT</button> -->
                              <input type="submit" name="simpan" class="btn btn-primary waves-effect">

          <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
    
          <?php $no=0; ?>
           <?php foreach ($groups as $group):?>
              <div class="demo-checkbox">
                 

        
              <?php
                $no++;
                     $idhtml = "basic_checkbox_".$no;
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {

                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                      
                  }
                 
              ?>
              <input type="checkbox" class="form-control" id="<?php echo $idhtml ?>" name="groups[]"  value="<?php echo $group['id'];?>"<?php echo $checked;?> >
               <label for="<?php echo $idhtml ?>"><?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?></label>

              </div>
    
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/footer','refresh'); ?>

    <script src="<?php echo site_url('assets/admin/'); ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo site_url('assets/admin/'); ?>js/pages/forms/editors.js"></script>

