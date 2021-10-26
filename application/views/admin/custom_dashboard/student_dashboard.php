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
                    if($this->module_lib->hasActive('student_information')){
                   if ($this->rbac->hasPrivilege('student', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('student/search') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('student_details'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php } if ($this->rbac->hasPrivilege('student', 'can_add')) {?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('student/create') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('student_admission'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }  if ($this->module_lib->hasActive('online_admission')) {
                            if ($this->rbac->hasPrivilege('online_admission', 'can_view')) { ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/onlinestudent') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('online') . " " . $this->lang->line('admission'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }}    if ($this->rbac->hasPrivilege('disable_student', 'can_view')) {?>

                       
                 

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('student/disablestudentslist') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('disabled_students') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                 <?php } if ($this->module_lib->hasActive('multi_class')) {
                            if($this->rbac->hasPrivilege('multi_class_student','can_view')){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('student/multiclass') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"> <?php echo $this->lang->line('multiclass') . " " . $this->lang->line('student'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }} if($this->rbac->hasPrivilege('student','can_delete')){?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('student/bulkdelete') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('bulk') . " " . $this->lang->line('delete'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }  if ($this->rbac->hasPrivilege('student_categories', 'can_view')) {?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('category') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('student_categories'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } if ($this->rbac->hasPrivilege('student_houses', 'can_view')) {?>
                                                <div class="col-md-3 col-sm-6">
                            <div class="info-box  bg-yellow">
                                <a href="<?php echo site_url('admin/schoolhouse') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('house'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } if($this->rbac->hasPrivilege('disable_reason','can_view')){?>
                                                <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/disable_reason') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('disable') . " " . $this->lang->line('reason'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } }?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







