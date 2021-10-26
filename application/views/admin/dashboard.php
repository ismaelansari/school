<?php  //echo date('F Y');die;  ?>
<style type="text/css">
  .borderwhite{border-top-color: #fff !important;}
  .box-header>.box-tools {display: none;}
  .sidebar-collapse #barChart{height: 100% !important;}
  .sidebar-collapse #lineChart{height: 100% !important;}
  span.info-box-text.cus_marg {
    /*margin-top: 13px;*/
     padding: 25px; 
     color:#fff;
}
</style>
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content">
       <div class="col-md-12">
                      
            <?php if($mysqlVersion && $sqlMode && strpos($sqlMode->mode,'ONLY_FULL_GROUP_BY') !== FALSE){ ?>
              <div class="alert alert-danger">
                may not work properly because ONLY_FULL_GROUP_BY is enabled, consult with your hosting provider to disable ONLY_FULL_GROUP_BY in sql_mode configuration.
              </div>
              <?php } ?>

                <?php
                foreach ($notifications as $notice_key => $notice_value) {
                    ?>

                    <div class="dashalert alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="alertclose close close_notice" data-dismiss="alert" aria-label="Close" data-noticeid="<?php echo $notice_value->id; ?>"><span aria-hidden="true">&times;</span></button>

                        <a href="<?php echo site_url('admin/notification') ?>"><?php echo $notice_value->title; ?></a>
                    </div>

                    <?php
                }
                ?>

            </div>

           

<!-- SECTION 1 -->
      <div class="row">  
      <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Daily Work</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>  
   <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php 
                    if($this->module_lib->hasActive('front_office')){
                    if ($this->rbac->hasPrivilege('front_office', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/adminnew/front_office') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('front_office'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }} 
                      if ($this->module_lib->hasActive('student_attendance')) {
                    if ($this->rbac->hasPrivilege('student_attendance', 'can_view')) {
                    ?>
                    <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/subjectattendence') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-calendar-check-o ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('attendance'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php 
                  }}
                     if($this->module_lib->hasActive('communicate')){
                   ?>
     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/adminnew/communicate') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-bullhorn ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('communicate'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>


                       
                    <?php } 

                     if ($this->module_lib->hasActive('download_center')){ ?>

<div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/adminnew/download_center') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-download ftlayer "></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('download_center') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                                        <?php 
                    if($this->module_lib->hasActive('homework')){
                    if ($this->rbac->hasPrivilege('homework', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-blue">
                                <a href="<?php echo base_url(); ?>homework">
                                    <span class="info-box-icon bg-blue"><i class="fa fa-flask ftlayer "></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('homework'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }} ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <?php } ?>
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 1 END -->
<!-- SECTION 2 -->
      <div class="row">  
      <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Important Link</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>  
   <div class="row">

            <div class="col-md-12">
                <div class="row">
                <?php  if ($this->module_lib->hasActive('student_information')) { ?>
                     <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/adminnew/student_informations') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-user-plus ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('student_information'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                      <?php } if ($this->module_lib->hasActive('human_resource')) {?>
                           <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/adminnew/human_resources') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-sitemap ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('human_resource'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php 
                  }
                    
                     ?>
         
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <?php } ?>
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 2 END -->
          <!-- SECTION 3 -->
      <div class="row"> 
            <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Account</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>     
   <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php 
                    if($this->module_lib->hasActive('fees_collection')){
                    if ($this->rbac->hasPrivilege('Monthly fees_collection_widget', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('studentfee') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-money ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('fees_collection'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }} 
                    if($this->module_lib->hasActive('expense')){
                    if ($this->rbac->hasPrivilege('expense', 'can_view')) { ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo base_url(); ?>admin/expense">
                                    <span class="info-box-icon bg-red"><i class="fa fa-money ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('expenses'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php }} 
                   if ($this->module_lib->hasActive('income')) {

                     if ($this->rbac->hasPrivilege('income', 'can_view')) { ?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo base_url(); ?>admin/income">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-usd ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('income'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                  <?php } }?>
                  
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <?php } ?>
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 3 END -->
               <!-- SECTION 4 -->
      <div class="row">  
                  <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Academics</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>       
   <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php 
                    if($this->module_lib->hasActive('examination')){
                     ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/adminnew/examations') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-map-o ftlayer "></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('examinations'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                               <?php
                         if ($this->module_lib->hasActive('online_examination')) { ?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/adminnew/online_examations') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-rss ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('online')."  ".$this->lang->line('examinations') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php 
                     if($this->module_lib->hasActive('academics')){
                    ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/adminnew/academics') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-mortar-board ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('academics'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } 

                     if ($this->module_lib->hasActive('certificate')) {?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/adminnew/certificates') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-newspaper-o ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('certificate'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                   
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <?php } ?>
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 4 END -->
               <!-- SECTION 5 -->
      <div class="row">   
                  <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Other Services</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>      
   <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php 
                    if($this->module_lib->hasActive('transport')){
                    ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo site_url('admin/adminnew/transport') ?>">
                                    <span class="info-box-icon bg-green"><i class="fa fa-bus ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('transport'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php 
                     if($this->module_lib->hasActive('hostel')){
                   ?>

                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo site_url('admin/adminnew/hostel') ?>">
                                    <span class="info-box-icon bg-red"><i class="fa fa-building-o ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('hostel'); ?></span>
                                  
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } 

                    if($this->module_lib->hasActive('inventory')){ ?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo site_url('admin/adminnew/inventory') ?>">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-object-group ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('inventory'); ?></span>
                                       
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                         if($this->module_lib->hasActive('library')){?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-yellow">
                                <a href="<?php echo site_url('admin/adminnew/library') ?>">
                                    <span class="info-box-icon bg-yellow"><i class="fa fa-book ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('library') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                                        <?php
                         if ($this->module_lib->hasActive('reports')){ ?>


                        <div class="col-md-3 col-sm-6">
                            <div class="info-box bg-blue">
                                <a href="<?php echo site_url('admin/adminnew/report') ?>">
                                    <span class="info-box-icon bg-blue"><i class="fa fa-line-chart ftlayer "></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('report') ; ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>   
           
         
                    

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <?php } ?>
          </div><!--./row-->
            
        </div><!--./row-->
     

          <!-- SECTION 5 END -->

           
      <div class="row">  
       <?php 
                    if($this->module_lib->hasActive('system_settings')){
                     ?>  
               <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">System Settings</h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div>     
                  <?php } ?>
<div class="row">

            <div class="col-lg-9 col-md-9 col-sm-12 col80">
                <div class="row">
                    <?php 
                    if($this->module_lib->hasActive('system_settings')){
                     ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-green">
                                <a href="<?php echo base_url(); ?>schsettings">
                                    <span class="info-box-icon bg-green"><i class="fa fa-gears ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('general_settings'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                   <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-red">
                                <a href="<?php echo base_url(); ?>smsconfig">
                                    <span class="info-box-icon bg-red"><i class="fa fa-gears ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('sms_setting'); ?></span>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                 <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-aqua">
                                <a href="<?php echo base_url(); ?>admin/customfield">
                                    <span class="info-box-icon bg-aqua"><i class="fa fa-gears ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('custom')." ".$this->lang->line('fields'); ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                                 <div class="col-md-4 col-sm-6">
                            <div class="info-box bg-blue">
                                <a href="<?php echo base_url(); ?>admin/frontcms">
                                    <span class="info-box-icon bg-blue"><i class="fa fa-empire ftlayer"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text cus_marg"><?php echo $this->lang->line('front_cms_setting'); ?></span>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>   
           
         
                         <?php
                        if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_view')) {
                            $div_rol = 3;
                            ?>
                            <div class="box box-primary borderwhite">
                                <div class="box-body">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /. box -->
                        <?php } ?> 

            </div><!--./col-lg-9-->
            <?php if ($this->rbac->hasPrivilege('staff_role_count_widget', 'can_view')) {
              // print_r($roles);
                ?>

            <div class="col-lg-3 col-md-3 col-sm-12 col20">
              
                    <?php foreach ($roles as $key => $value) {
                        ?>
                        <div class="info-box">
                            <a href="#">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-user-secret"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?php echo $key; ?></span>
                                    <span class="info-box-number"><?php echo $value; ?></span>
                                </div>
                            </a>
                        </div>     
                <?php } ?>
               
                
              
            </div><!--./col-lg-3-->
            <?php } ?>
          </div><!--./row-->
            
       

           
                    
           
         

        </div><!--./row-->


</div>
<div id="newEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo "Add New Event"; ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form"  id="addevent_form" method="post" enctype="multipart/form-data" action="">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('title'); ?></label>
                            <input class="form-control" name="title" id="input-field"> 
                            <span class="text-danger"><?php echo form_error('title'); ?></span>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                            <textarea name="description" class="form-control" id="desc-field"></textarea></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('date'); ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="event_dates" class="form-control pull-right" id="date-field">
                            </div>
                              <!-- <input class="form-control" type="text" autocomplete="off"  name="event_dates" id="date-field"> --></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('color'); ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" id="eventcolor" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)  ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('type'); ?></label>
                            <br/>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="public" id="public"><?php echo $this->lang->line('public'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="private" checked id="private"><?php echo $this->lang->line('private'); ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="sameforall" id="public"><?php echo $this->lang->line('all'); ?> <?php echo $role ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="event_type" value="protected" id="public"><?php echo $this->lang->line('protected'); ?>
                            </label> </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="btn btn-primary submit_addevent pull-right" value="<?php echo $this->lang->line('save'); ?>"></div> </form>
                </div>

            </div>
        </div>
    </div>
</div>  
<div id="viewEventModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal-dialog2 modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo "View Event"; ?></h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <form role="form"   method="post" id="updateevent_form"  enctype="multipart/form-data" action="" >
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('title') ?></label>
                            <input class="form-control" name="title" placeholder="Event Title" id="event_title"> 
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('description') ?></label>
                            <textarea name="description" class="form-control" placeholder="Event Description" id="event_desc"></textarea></div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('date') ?></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="eventdates" class="form-control pull-right" id="eventdates">
                            </div>
                              <!-- <input class="form-control" type="text" autocomplete="off" name="eventdates" placeholder="Event Dates" id="eventdates"> --></div>
                        <input type="hidden" name="eventid" id="eventid">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('color') ?></label>
                            <input type="hidden" name="eventcolor" autocomplete="off" placeholder="Event Color" id="event_color" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <?php //print_r($event_colors)  ?>

                            <?php
                            $i = 0;
                            $colors = '';
                            foreach ($event_colors as $color) {
                                $colorid = trim($color, "#");
                                // print_r($colorid);
                                $color_selected_class = 'cpicker-small';
                                if ($i == 0) {
                                    $color_selected_class = 'cpicker-big';
                                }
                                $colors .= "<div id=" . $colorid . " class='calendar-cpicker cpicker " . $color_selected_class . "' data-color='" . $color . "' style='background:" . $color . ";border:1px solid " . $color . "; border-radius:100px'></div>";
                                //   echo $colors ;
                                $i++;
                            }
                            echo '<div class="cpicker-wrapper selectevent">';
                            echo $colors;
                            echo '</div>';
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line('event') ?><?php echo $this->lang->line('type') ?></label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="public" id="public"><?php echo $this->lang->line('public') ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="private" id="private"><?php echo $this->lang->line('private') ?> 
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="sameforall" id="public"><?php echo $this->lang->line('all') ?> <?php echo $role ?>
                            </label>
                            <label class="radio-inline">

                                <input type="radio" name="eventtype" value="protected" id="public"><?php echo $this->lang->line('protected') ?> 
                            </label>
                        </div>

                        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">

                            <input type="submit" class="btn btn-primary submit_update pull-right" value="<?php echo $this->lang->line('save'); ?>">
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <?php if ($this->rbac->hasPrivilege('calendar_to_do_list', 'can_delete')) { ?>
                                <input type="button" id="delete_event" class="btn btn-primary submit_delete pull-right" value="<?php echo $this->lang->line('delete'); ?>">
<?php } ?>
                        </div>       
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>  
<style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- <script src="<?php echo base_url() ?>backend/js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>backend/js/utils.js"></script> -->
<script type="text/javascript">
 
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: [<?php foreach($incomegraph as $value){ ?>"<?php echo $value['income_category'];?>", <?php } ?> ],
      datasets: [
        {
          label: "Income",
          backgroundColor: [<?php $s=1; foreach($incomegraph as $value){ ?>"<?php echo incomegraphColors($s++);?>", <?php if($s==8){ $s=1; }} ?> ],
          data: [<?php $s=1; foreach($incomegraph as $value){ ?><?php echo $value['total'];?>, <?php } ?>]
        }
      ]
    },
     options: {
                responsive: true,
                circumference: Math.PI,
                rotation: -Math.PI,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
});

new Chart(document.getElementById("doughnut-chart1"), {
    type: 'doughnut',
    data: {
      labels: [<?php foreach($expensegraph as $value){ ?>"<?php echo $value['exp_category'];?>", <?php } ?>],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: [<?php $ss=1;foreach($expensegraph as $value){ ?>"<?php echo expensegraphColors($ss++); ?>", <?php if($ss==8){ $ss=1; }} ?>],
          data: [<?php foreach($expensegraph as $value){ ?><?php echo $value['total'];?>, <?php } ?>]
        }
      ]
    },
   options: {
                responsive: true,
                circumference: Math.PI,
                rotation: -Math.PI,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                   
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
});

<?php 
  if(($this->module_lib->hasActive('fees_collection')) || ($this->module_lib->hasActive('expense'))){
    ?>
    $(function () {
        var areaChartOptions = {
            showScale: true,
            scaleShowGridLines: false,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: false,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,

            maintainAspectRatio: true,
            responsive: true
        };
        var bar_chart = "<?php echo $bar_chart ?>";
        var line_chart = "<?php echo $line_chart ?>";
        if (line_chart) {


            var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
            var lineChart = new Chart(lineChartCanvas);
            var lineChartOptions = areaChartOptions;
            lineChartOptions.datasetFill = false;
            var yearly_collection_array = <?php echo json_encode($yearly_collection) ?>;
            var yearly_expense_array = <?php echo json_encode($yearly_expense) ?>;
            var total_month = <?php echo json_encode($total_month) ?>;
            var areaChartData_expense_Income = {
                labels: total_month,
                datasets: [
                    {
                        label: "Expense",
                        fillColor: "rgba(215, 44, 44, 0.7)",
                        strokeColor: "rgba(215, 44, 44, 0.7)",
                        pointColor: "rgba(233, 30, 99, 0.9)",
                        pointStrokeColor: "#c1c7d1",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: yearly_expense_array
                    },
                    {
                        label: "Collection",
                        fillColor: "rgba(102, 170, 24, 0.6)",
                        strokeColor: "rgba(102, 170, 24, 0.6)",
                        pointColor: "rgba(102, 170, 24, 0.9)",
                        pointStrokeColor: "rgba(102, 170, 24, 0.6)",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(60,141,188,1)",
                        data: yearly_collection_array
                    }
                ]
            };


            lineChart.Line(areaChartData_expense_Income, lineChartOptions);
        }

        var current_month_days = <?php echo json_encode($current_month_days) ?>;
        var days_collection = <?php echo json_encode($days_collection) ?>;
        var days_expense = <?php echo json_encode($days_expense) ?>;

        var areaChartData_classAttendence = {
            labels: current_month_days,
            datasets: [
                {
                    label: "Electronics",
                    fillColor: "rgba(102, 170, 24, 0.6)",
                    strokeColor: "rgba(102, 170, 24, 0.6)",
                    pointColor: "rgba(102, 170, 24, 0.6)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: days_collection
                },
                {
                    label: "Digital Goods",
                    fillColor: "rgba(233, 30, 99, 0.9)",
                    strokeColor: "rgba(233, 30, 99, 0.9)",
                    pointColor: "rgba(233, 30, 99, 0.9)",
                    pointStrokeColor: "rgba(233, 30, 99, 0.9)",
                    pointHighlightFill: "rgba(233, 30, 99, 0.9)",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: days_expense
                }
            ]
        };
        if (bar_chart) {
            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChart = new Chart(barChartCanvas);

            var barChartData = areaChartData_classAttendence;
            barChartData.datasets[1].fillColor = "rgba(233, 30, 99, 0.9)";
            barChartData.datasets[1].strokeColor = "rgba(233, 30, 99, 0.9)";
            barChartData.datasets[1].pointColor = "rgba(233, 30, 99, 0.9)";
            var barChartOptions = {
                scaleBeginAtZero: true,
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                scaleShowHorizontalLines: false,
                scaleShowVerticalLines: false,
                barShowStroke: true,
                barStrokeWidth: 2,
                barValueSpacing: 5,
                barDatasetSpacing: 1,                
                responsive: true,
                maintainAspectRatio: true
            };
            barChartOptions.datasetFill = false;
            barChart.Bar(barChartData, barChartOptions);
        }
    });

    <?php
  }
?>
   

    $(document).ready(function () {

        $(document).on('click', '.close_notice', function () {
            var data = $(this).data();

 
            $.ajax({
                type: "POST",
                url: base_url + "admin/notification/read",
                data: {'notice': data.noticeid},
                dataType: "json",
                success: function (data) {
                    if (data.status == "fail") {

                        errorMsg(data.msg);
                    } else {
                        successMsg(data.msg);
                    }

                }
            });


        });
    });
</script>




