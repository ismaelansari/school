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
                   if ($this->module_lib->hasActive('reports')) {
                     if ($this->rbac->hasPrivilege('student_report', 'can_view')) {

                                     ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo base_url(); ?>report/studentinformation">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('student_information'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }   if (($this->rbac->hasPrivilege('fees_statement', 'can_view') ||
                                    $this->rbac->hasPrivilege('balance_fees_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('fees_collection_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('online_fees_collection_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('income_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('expense_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('payroll_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('income_group_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('expense_group_report', 'can_view'))) {?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo base_url(); ?>report/finance">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('finance'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }  if (($this->rbac->hasPrivilege('attendance_report', 'can_view') ||
                                    $this->rbac->hasPrivilege('staff_attendance_report', 'can_view'))) { ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo base_url(); ?>report/attendance">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('attendance'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }    if (($this->rbac->hasPrivilege('rank_report', 'can_view'))) {?>

                       
                 

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo base_url(); ?>report/examinations">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('examinations') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                 <?php } if($this->module_lib->hasActive('online_examination')){
                                if(($this->rbac->hasPrivilege('online_exam_wise_report','can_view') ||
                                $this->rbac->hasPrivilege('online_exams_report','can_view') ||
                                $this->rbac->hasPrivilege('online_exams_attempt_report','can_view') ||
                                $this->rbac->hasPrivilege('online_exams_rank_report','can_view')
                            )){ ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo base_url(); ?>admin/onlineexam/report">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"> <?php echo $this->lang->line('online')." ".$this->lang->line('examinations'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }}    if($this->module_lib->hasActive('human_resource')){
                                if(($this->rbac->hasPrivilege('staff_report','can_view') || $this->rbac->hasPrivilege('payroll_report','can_view'))){?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo base_url(); ?>report/staff_report">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('human_resource'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
<?php }  } ?>
                          
                   
                                        
                    
                                
                    <?php }?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







