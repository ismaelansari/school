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
                      if ($this->module_lib->hasActive('academics')) {
                if (($this->rbac->hasPrivilege('class_timetable', 'can_view') ||
                        $this->rbac->hasPrivilege('teachers_timetable', 'can_view') ||
                        $this->rbac->hasPrivilege('assign_class_teacher', 'can_view') ||
                        $this->rbac->hasPrivilege('promote_student', 'can_view') ||
                        $this->rbac->hasPrivilege('subject_group', 'can_view') ||
                        $this->rbac->hasPrivilege('section', 'can_view') || 
                        $this->rbac->hasPrivilege('subject', 'can_view') ||
                        $this->rbac->hasPrivilege('class', 'can_view') || 
                        $this->rbac->hasPrivilege('section', 'can_view')
                        )) {?>
                              <?php
                            if ($this->rbac->hasPrivilege('class_timetable', 'can_view')) {
                                ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/timetable/classreport') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('class_timetable'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }   if ($this->rbac->hasPrivilege('teachers_time_table', 'can_view')) {?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/timetable/mytimetable') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"> <?php echo $this->lang->line('teachers')." ".$this->lang->line('timetable')?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                       <?php
                            }
                           if ($this->rbac->hasPrivilege('assign_class_teacher', 'can_view')) {
                                ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/teacher/assign_class_teacher') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('assign_class_teacher'); ?></span>
                                       
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







