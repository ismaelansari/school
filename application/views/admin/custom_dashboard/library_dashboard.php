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
                    if (($this->rbac->hasPrivilege('books', 'can_view') ||
                       
                        $this->rbac->hasPrivilege('issue_return', 'can_view') ||
                        $this->rbac->hasPrivilege('add_staff_member', 'can_view') ||
                        $this->rbac->hasPrivilege('add_student', 'can_view')
                        )) {
                    ?>
                       
<?php if ($this->rbac->hasPrivilege('books', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/book/getall') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('book_list'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <?php }if ($this->rbac->hasPrivilege('issue_return', 'can_view')) { ?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/member') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('issue_return')?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('add_student', 'can_view')) { ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/member/student') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('add_student'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
 <?php } ?>
                            <?php if ($this->rbac->hasPrivilege('add_staff_member', 'can_view')) { ?>

                       
                 

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/member/teacher') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-angle-double-right"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('add_staff_member'); ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                 
                 

                       

                        
                    <?php } }  ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
           
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->




</div>







