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
                               if ($this->module_lib->hasActive('human_resource')) {
                if (($this->rbac->hasPrivilege('staff', 'can_view') ||
                        
                        $this->rbac->hasPrivilege('approve_leave_request', 'can_view') ||
                        $this->rbac->hasPrivilege('apply_leave', 'can_view') ||
                        $this->rbac->hasPrivilege('leave_types', 'can_view') ||
                        $this->rbac->hasPrivilege('teachers_rating','can_view') ||
                        $this->rbac->hasPrivilege('department', 'can_view') ||
                        $this->rbac->hasPrivilege('designation', 'can_view') ||
                        $this->rbac->hasPrivilege('disable_staff', 'can_view'))) {
                    ?>
                    <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/staff') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('staff_directory'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php } ?>
                     <?php
                            if ($this->rbac->hasPrivilege('staff_attendance', 'can_view')) {
                                ?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/staffattendance') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('staff_attendance'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } if ($this->rbac->hasPrivilege('staff_payroll', 'can_view')) {?>
                   
     <div class="col-md-3 col-sm-6 ">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/payroll') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('payroll'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
<?php } if ($this->rbac->hasPrivilege('approve_leave_request', 'can_view')) { ?>

                       
                 

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/dispatch') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('postal_dispatch') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                 <?php } if ($this->rbac->hasPrivilege('apply_leave', 'can_view')) {?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/leaverequest/leaverequest') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('approve_leave_request'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }if ($this->rbac->hasPrivilege('leave_types', 'can_view')) { ?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/leavetypes') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('leave_type'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }  if($this->rbac->hasPrivilege('teachers_rating','can_view')){ ?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/staff/rating') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('teachers') . " " . $this->lang->line('rating'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }if ($this->rbac->hasPrivilege('department', 'can_view')) { ?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/department/department') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('department'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php } if ($this->rbac->hasPrivilege('designation', 'can_view')) { ?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/designation/designation') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('designation'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }  if ($this->rbac->hasPrivilege('disable_staff', 'can_view')) {?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/staff/disablestafflist') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('disabled_staff'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }}} ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







