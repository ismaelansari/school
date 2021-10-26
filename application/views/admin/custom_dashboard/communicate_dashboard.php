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
                   if ($this->module_lib->hasActive('communicate')) {
                if (($this->rbac->hasPrivilege('notice_board', 'can_view') ||
                        $this->rbac->hasPrivilege('email', 'can_view') ||
                        $this->rbac->hasPrivilege('sms', 'can_view') ||
                        $this->rbac->hasPrivilege('email_sms_log', 'can_view'))) {
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/notification') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('notice_board'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/mailsms/compose') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('send')."  ".$this->lang->line('email'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                   
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/mailsms/compose_sms') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('send')."  ".$this->lang->line('sms'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>


                       
                 

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/mailsms') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo "EMAIL/SMS  ".$this->lang->line('log')."S" ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                 
                 

                       

                        
                    <?php }} ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







