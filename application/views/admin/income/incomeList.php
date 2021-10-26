

<?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat();
$language = $this->customlib->getLanguage();
$language_name = $language["short_code"];
 ?><style type="text/css">
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-usd"></i> <?php echo $this->lang->line('income'); ?></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
            if ($this->rbac->hasPrivilege('income', 'can_add')) {
                ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('add_income'); ?></h3>
                        </div><!-- /.box-header -->

                        <form id="form1" action="<?php echo base_url() ?>admin/income"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <?php echo $this->session->flashdata('msg') ?>
                                <?php } ?>
                                <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                }
                                ?>
                                <?php echo $this->customlib->getCSRF(); ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('income_head'); ?></label><small class="req"> *</small>

                                    <select autofocus="" id="inc_head_id" name="inc_head_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($incheadlist as $inchead) {
                                            ?>
                                            <option value="<?php echo $inchead['id'] ?>"<?php
                                            if (set_value('inc_head_id') == $inchead['id']) {
                                                echo "selected = selected";
                                            }
                                            ?>><?php echo $inchead['income_category'] ?></option>

                                            <?php
                                            //$count++;
                                        }
                                        ?>
                                    </select><span class="text-danger"><?php echo form_error('inc_head_id'); ?></span>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('name'); ?><small class="req"> *</small></label>
                                    <input id="name" name="name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" />
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('invoice_no'); ?></label>
                                    <input id="invoice_no" name="invoice_no" placeholder="" type="text" class="form-control"  value="<?php echo set_value('invoice_no'); ?>" />
                                    <span class="text-danger"><?php echo form_error('invoice_no'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('date'); ?><small class="req"> *</small></label>
                                    <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date'); ?>" readonly="readonly" />
                                    <span class="text-danger"><?php echo form_error('date'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('amount'); ?><small class="req"> *</small></label>
                                    <input id="amount" name="amount" placeholder="" type="text" class="form-control"  value="<?php echo set_value('amount'); ?>" />
                                    <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                                <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="input-type"><?php echo $this->lang->line('payment_mode'); ?></label>
                                                <div id="input-type" class="row">
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">

                                                            <input name="payment_mode" class="payment_mode" id="input-type-student" value="1" type="radio"  <?php echo set_radio('payment_mode', '1', true); ?> autocomplete="off">Cash                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input name="payment_mode" class="payment_mode" id="input-type-student" value="2" type="radio"  <?php echo set_radio('payment_mode', '2', false); ?> >Bank                                                        </label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input name="payment_mode" class="payment_mode" id="input-type-tutor" value="3" type="radio"  <?php echo set_radio('payment_mode', '3', false); ?> >
                                                            Online Payment                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group bank_name">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <!-- <input id="bank_name" name="bank_name" placeholder="" type="text" class="form-control"  value="<?php //echo set_value('bank_name'); ?>" />
                                    <span class="text-danger"><?php //echo form_error('bank_name'); ?></span> -->
                                    <select autofocus="" id="bank_name" name="bank_name" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($bank as $exphead) {
                                            ?>
                                            <option value="<?php echo $exphead['id'] ?>"<?php
                                            if (set_value('id') == $exphead['id']) {
                                                echo "selected =selected";
                                            }
                                            ?>><?php echo $exphead['name'] ?></option>

                                            <?php
                                            $count++;
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('bank_name'); ?></span>
                                </div>

                                <div class="form-group check_number">
                                    <label for="exampleInputEmail1">Check Number</label>
                                    <input id="check_number" name="check_number" placeholder="" type="text" class="form-control"  value="<?php echo set_value('check_number'); ?>" />
                                    <span class="text-danger"><?php echo form_error('check_number'); ?></span>
                                </div>

                                <div class="form-group app_name">
                                    <label for="exampleInputEmail1">Online App Name</label>
                                    <input id="app_name" name="app_name" placeholder="" type="text" class="form-control"  value="<?php echo set_value('app_name'); ?>" />
                                    <span class="text-danger"><?php echo form_error('app_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('attach_document'); ?></label>
                                    <input id="documents" name="documents" placeholder="" type="file" class="filestyle form-control" data-height="40"  value="<?php echo set_value('documents'); ?>" />
                                    <span class="text-danger"><?php echo form_error('documents'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description'); ?></textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>

                </div><!--/.col (right) -->
                <!-- left column -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('income', 'can_add')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"> <?php echo $this->lang->line('income_list'); ?></h3>
                        <div class="box-tools pull-right">
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="download_label"><?php echo $this->lang->line('income_list'); ?></div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped table-bordered example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('invoice_no'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('date'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('income_head'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('payment_mode'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('bank_name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('check_number'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('app_name'); ?>
                                        </th>
                                        <th><?php echo $this->lang->line('amount'); ?>
                                        </th>
                                        <th class="text-right"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($incomelist)) {
                                        ?>

                                        <?php
                                    } else {
                                        foreach ($incomelist as $income) {
                                            ?>
                                            <tr>
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover"><?php echo $income['name'] ?></a>

                                                    <div class="fee_detail_popover " style="display: none">
                                                        <?php
                                                        if ($income['note'] == "") {
                                                            ?>
                                                            <p class="text text-danger no-print"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info no-print" ><?php echo $income['note']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $income["invoice_no"]; ?>
                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($income['date'])) ?></td>

                                                <td class="mailbox-name">
                                                    <?php
                                                    $income_head = $income['income_category'];
                                                    echo "$income_head";
                                                    ?>


                                                </td>

                                                <td class="mailbox-name">
                                                    <?php echo paymentMode($income['payment_mode']) ?>

                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $income['bank_name_str'] ?>

                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $income['check_number'] ?>

                                                </td>
                                                <td class="mailbox-name">
                                                    <?php echo $income['payment_app_name'] ?>

                                                </td>
                                                <?php
                                                $inc_head_id = $income['inc_head_id'];
                                                $arr1 = str_split($inc_head_id);
                                                ?>

                                                <td class="mailbox-name"><?php echo ($currency_symbol . $income['amount']); ?></td>
                                                <td class="mailbox-date pull-right">
                                                    <?php if ($income['documents']) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/download/<?php echo $income['documents'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('download'); ?>">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php }
                                                    ?>

                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_edit')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/edit/<?php echo $income['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    <?php } ?>
                                                    <?php
                                                    if ($this->rbac->hasPrivilege('income', 'can_delete')) {
                                                        ?>
                                                        <a data-placement="left" href="<?php echo base_url(); ?>admin/income/delete/<?php echo $income['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table><!-- /.table -->



                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function () {
       
       


        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });

    });

    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                 alert();
                }
            }
        ]
    } );
} );

$('input[name="payment_mode"]').click(function(){
        if($(this).val() == "1"){
            $('.bank_name').hide();
            $('.check_number').hide();
            $('.app_name').hide();
        }else if($(this).val() == "2"){
            $('.bank_name').show();
            $('.check_number').show();
            $('.app_name').hide();
        }else if($(this).val() == "3"){
            $('.bank_name').hide();
            $('.check_number').hide();
            $('.app_name').show();
        }
    });
    $('.bank_name').hide();
    $('.check_number').hide();
    $('.app_name').hide();
    $('input[name="payment_mode"]:checked').click();
</script>