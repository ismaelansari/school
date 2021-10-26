<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-gears"></i> <?php echo $this->lang->line('system_settings'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('session_setting', 'can_add')) { ?>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Bank</h3>
                        </div>
                        <form id="form1" action="<?php echo site_url('sessions/bankcreate') ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?> 
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label>Bank Name</label><small class="req"> *</small>
                                    <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
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
                echo "8";
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
                                        <th>Bank name</th>
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
                                            <td class="mailbox-name"><?php echo $session['name'] ?></td>
                                            <td class="mailbox-name"><?php
                                                if ($session['is_active'] != 0) {
                                                    ?>
                                                    <span class="label bg-green"><?php echo $this->lang->line('active'); ?></span>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <span class="label bg-green">DeActive</span>
                                                    <?php
                                                }
                                                ?></td>
                                            <td class="mailbox-date text-right">
                                                <?php if ($this->rbac->hasPrivilege('session_setting', 'can_edit')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sessions/editbank/<?php echo $session['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <?php } if ($this->rbac->hasPrivilege('session_setting', 'can_delete')) { ?>
                                                    <a data-placement="left" href="<?php echo base_url(); ?>sessions/deletebank/<?php echo $session['id'] ?>"class="btn btn-default btn-xs <?php
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