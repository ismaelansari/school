<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('session_setting', 'can_add')) { ?>
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_session'); ?></h3>
                        </div>
                        <form id="form1" action="<?php echo site_url('sessions/create') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?> 
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('session'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="session" name="session" placeholder="" type="text" class="form-control"  value="<?php echo set_value('session'); ?>" />
                                    <span class="text-danger"><?php echo form_error('session'); ?></span>
                                </div>
<!-- 
                                <div class="form-group">
                                    <label><?php //echo $this->lang->line('amount'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="opening_amount" name="opening_amount" placeholder="" type="text" class="form-control"  value="<?php //echo set_value('opening_amount'); ?>" />
                                    <span class="text-danger"><?php //echo form_error('opening_amount'); ?></span>
                                </div> -->


                                <!-- -->
                                <div class="container py-4">
                                <div class="row">
                                <div class="col-md-12 form_sec_outer_task border ">
                                <div class="row">
                                <div class="col-md-12 bg-light p-2 mb-3">
                                <div class="row">
                                <div class="col-md-6">
                                <div class="row">
                                <div class="col-md-6">
                                <h4 class="frm_section_n">Opening Balance</h4>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label>Bank.</label>
                                </div>
                                <div class="col-md-4">
                                <label> Amount </label>
                                </div>
                                </div>
                                <div class="col-md-12 p-0">
                                <div class="col-md-12 form_field_outer p-0">
                                <div class="row form_field_outer_row">
                                <div class="form-group col-md-4">
                                <select name="bank[]" id="no_type_1" class="form-control" required="required">
                                <option value="">--Select bank/cash--</option>
                                <option value="0"><?php echo "Cash"?></option>
                                <?php
                                foreach($bank as $b){
                                    ?>
                                    <option value="<?php echo $b['id']?>"><?php echo $b['name']?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                <input type="number" min="0" class="form-control w_90 open_amount" name="amount[]" value="0" id="mobileb_no_1" placeholder="Enter amount."  oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" />
                                </div>

                                <div class="form-group col-md-2 add_del_btn_outer">
                                <button type="button" class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
                                <i class="fas fa-copy"></i>
                                </button>
                                <button type="button" class="btn_round remove_node_btn_frm_field" disabled>
                                <i class="fas fa-trash-alt"></i>
                                </button>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <div class="row ml-0 bg-light mt-3 border py-3">
                                <div class="col-md-12">
                                <!-- <button type="button" class="btn btn-outline-lite py-0 add_new_frm_field_btn"><i class="fas fa-plus add_icon"></i> Add New field row</button> -->
                                </div>
                                </div>
                                </div>
                                </div>
                                <!-- End -->



                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>  
                </div>
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('session_setting', 'can_add')) {
                echo "12";
            } else {
                echo "12";
            }
            ?>">                
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('session_list'); ?></h3>
                    </div>
                    <div class="box-body">
                        <?php if ($this->session->flashdata('list_msg')) { ?>
                            <?php echo $this->session->flashdata('list_msg') ?>
                        <?php } ?>
                        <div class="mailbox-messages">
                        <div class="">
                            <div class="download_label"><?php echo $this->lang->line('session_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('session'); ?></th>
                                        <th><?php echo $this->lang->line('opening_balance'); ?></th>
                                        <th>Income</th>
                                        <th>Collect Fee</th>
                                        <th>Expense</th>
                                        <th>Closing Balance</th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($sessionlist as $session) {
                                        ?>
                                        <tr>
                                            <td class="mailbox-name"><?php echo $session['session'] ?></td>
                                            <td class="mailbox-name"><?php 
                                            echo (number_format($session['amount']??0, 2, '.', ''));
                                            ?>
                                            </td>
                                            <td class="mailbox-name"><?php echo number_format($session['income']??0, 2, '.', '') ?></td>
                                            <td class="mailbox-name"><?php echo number_format($session['fee']??0, 2, '.', '') ?></td>
                                            <td class="mailbox-name"><?php echo number_format($session['expense']??0, 2, '.', '') ?></td>
                                            <td class="mailbox-name"><?php echo number_format($session['total']??0, 2, '.', '') ?></td>
                                            <td class="mailbox-name"><?php
                                                if ($session['active'] != 0) {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $this->lang->line('active'); ?></span>
                                                    <?php
                                                } else {
                                                    
                                                }
                                                ?></td>
                                            <td class="mailbox-date text-right">
                                                <?php if ($this->rbac->hasPrivilege('session_setting', 'can_edit')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sessions/edit/<?php echo $session['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } if ($this->rbac->hasPrivilege('session_setting', 'can_delete')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sessions/delete/<?php echo $session['id'] ?>"class="btn btn-default btn-xs <?php
                                                    if ($session['active'] != 0) {
                                                        echo'disabled';
                                                    }
                                                    ?>"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                        <i class="fa fa-remove"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                       </div> 
                    </div>

                </div>
            </div>

        </div> 
    </section>
</div>
<script type="text/javascript">
    $("#btnreset").click(function () {
        $("#form1")[0].reset();
    });
</script>
<script type="text/javascript">



$(document).ready(function(){
    $("body").on("click",".add_new_frm_field_btn", function (){ 
      console.log("clicked");
      var index = $(".form_field_outer").find(".form_field_outer_row").length + 1;
      $(".form_field_outer").append(`
          <div class="row form_field_outer_row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control w_90" name="mobileb_no[]" id="mobileb_no_${index}" placeholder="Enter mobiel no." />
              </div>
              <div class="form-group col-md-4">
                <select name="no_type[]" id="no_type_${index}" class="form-control" >
                  <option>--Select type--</option>
                  <option>Personal No.</option>
                  <option>Company No.</option>
                  <option>Parents No.</option>
                </select>
              </div>
              <div class="form-group col-md-2 add_del_btn_outer">
                <button type="button" class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
                  <i class="fas fa-copy"></i>
                </button>

                <button type="button" class="btn_round remove_node_btn_frm_field" disabled>
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
        `);

      $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);
      $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);
    });
 });


    ///======Clone method
$(document).ready(function(){
    $("body").on("click", ".add_node_btn_frm_field", function (e) {
      var index = $(e.target).closest(".form_field_outer").find(".form_field_outer_row").length + 1;
      var cloned_el = $(e.target).closest(".form_field_outer_row").clone(true);

      $(e.target).closest(".form_field_outer").last().append(cloned_el).find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);

      $(e.target).closest(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);

    
      //change id
      $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("input[type='text']").attr("id", "mobileb_no_"+index);

      $(e.target).closest(".form_field_outer").find(".form_field_outer_row").last().find("select").attr("id", "no_type_"+index);

      console.log(cloned_el);
      //count++;
    });
 });


$(document).ready(function(){
    //===== delete the form fieed row
    $("body").on("click", ".remove_node_btn_frm_field", function () {
      $(this).closest(".form_field_outer_row").remove();
      console.log("success");
    });
  });

// Select your input element.
var number = document.getElementsByClassName('open_amount');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}

</script>