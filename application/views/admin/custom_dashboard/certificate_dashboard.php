<?php  //echo date('F Y');die;  ?>
<style type="text/css">
  .borderwhite{border-top-color: #fff !important;}
  .box-header>.box-tools {display: none;}
  .sidebar-collapse #barChart{height: 100% !important;}
  .sidebar-collapse #lineChart{height: 100% !important;}
  span.info-box-text.cus_marg {
    /*margin-top: 13px;*/
     padding: 13px; 
        color:#fff;
}
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content">
      
           

<!-- SECTION 1 -->
      <div class="row">  
     <div class="row">
      <div class="col-md-12">
                <div class="row">
                    <?php 
                    if ($this->module_lib->hasActive('certificate')) {
                if (($this->rbac->hasPrivilege('student_certificate', 'can_view') ||
                        $this->rbac->hasPrivilege('generate_certificate', 'can_view') ||
                        $this->rbac->hasPrivilege('student_id_card', 'can_view') ||
                        $this->rbac->hasPrivilege('generate_id_card', 'can_view'))) {?>
                              <?php
                            if ($this->rbac->hasPrivilege('generate_certificate', 'can_view')) {
                                ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/generatecertificate') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('certificate'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }  if ($this->rbac->hasPrivilege('generate_id_card', 'can_view')) {?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/generateidcard/') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('icard'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                       <?php
                            }
                           
                                ?>
     

                       
                 


                    <?php }} ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







