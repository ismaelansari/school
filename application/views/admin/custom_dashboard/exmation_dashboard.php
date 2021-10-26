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
                     if ($this->module_lib->hasActive('examination')) {
                if (($this->rbac->hasPrivilege('exam_group', 'can_view') ||
                        $this->rbac->hasPrivilege('exam_result', 'can_view') ||
                        $this->rbac->hasPrivilege('design_admit_card','can_view') ||
                        $this->rbac->hasPrivilege('print_admit_card','can_view') ||
                        $this->rbac->hasPrivilege('design_marksheet','can_view') ||
                        $this->rbac->hasPrivilege('print_marksheet','can_view') ||
                        $this->rbac->hasPrivilege('marks_grade', 'can_view')
                    )) {
                    ?>
                            <?php if ($this->rbac->hasPrivilege('exam_group', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/examgroup') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('exam') . " " . $this->lang->line('group') ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php } ?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/exam_schedule') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('exam_schedule'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                       <?php
                            
                             if ($this->rbac->hasPrivilege('exam_result', 'can_view')) {
                                ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/examresult') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"> <?php echo $this->lang->line('exam') . " " . $this->lang->line('result'); ?><span>
                                       
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







