<style type="text/css">
.collect_grp_fees{
    font-size: 15px;
    font-weight: 600;
}

    .fees-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .fees-list>.item {
        border-radius: 3px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        background: #fff;
    }
    .fees-list>.item:before, .fees-list>.item:after {
        content: " ";
        display: table;
    }
    .fees-list>.item:after {
        clear: both;
    }
    .fees-list .product-img {
        float: left;
    }
    .fees-list .product-img img {
        width: 50px;
        height: 50px;
    }
    .fees-list .product-info {
        margin-left: 0px;
    }
    .fees-list .product-title {
        font-weight: 600;
        font-size: 15px;
        display: inline;
    }
    .fees-list .product-title span{

        font-size: 15px;
        display: inline;
        font-weight: 100 !important;
    }
    .fees-list .product-description {
        display: block;
        color: #999;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .fees-list-in-box>.item {
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
        border-bottom: 1px solid #f4f4f4;
    }
    .fees-list-in-box>.item:last-of-type {
        border-bottom-width: 0;
    }
</style>
<div class="col-lg-12">
<div class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label"><?php echo $this->lang->line('date'); ?></label>
        <div class="col-sm-9">
            <input id="date" name="collected_date" placeholder="" type="text" class="form-control date" value="" readonly="readonly" autocomplete="off">
            <span id="form_collection_collected_date_error" class="text text-danger"></span>
        </div>
    </div>

      <!--                   <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"><?php //echo $this->lang->line('amount'); ?><small class="req"> *</small></label>
                            <div class="col-sm-9">

                                <input type="text" autofocus="" class="form-control modal_amount" id="amount" value="0"  >

                                <span class="text-danger" id="amount_error"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"> <?php //echo $this->lang->line('discount'); ?> <?php echo $this->lang->line('group'); ?></label>
                            <div class="col-sm-9">
                                <select class="form-control modal_discount_group" id="discount_group">
                                    <option value=""><?php// echo $this->lang->line('select'); ?></option>
                                </select>

                                <span class="text-danger" id="amount_error"></span>
                            </div>
                        </div> -->
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label"> <?php echo $this->lang->line('payment') . " " . $this->lang->line('mode'); ?></label>
        <div class="col-sm-9">
            <label class="radio-inline">
                <input name="payment_mode" class="payment_mode" id="input-type-student" value="1" type="radio"  <?php echo set_radio('payment_mode', '1', true); ?> autocomplete="off">Cash</label>
            <label class="radio-inline">
                <input name="payment_mode" class="payment_mode" id="input-type-student" value="2" type="radio"  <?php echo set_radio('payment_mode', '2', false); ?> >Bank</label>
            <label class="radio-inline">
                <input name="payment_mode" class="payment_mode" id="input-type-tutor" value="3" type="radio"  <?php echo set_radio('payment_mode', '3', false); ?> >
                                                            Online Payment</label>
            <span class="text-danger" id="payment_mode_error"></span>
        </div>
        <span id="form_collection_payment_mode_fee_error" class="text text-danger"></span>
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
        <label for="inputPassword3" class="col-sm-3 control-label"> <?php echo $this->lang->line('note') ?></label>

        <div class="col-sm-9">
            <textarea class="form-control" rows="3" name="fee_gupcollected_note" id="description" placeholder=""></textarea>
            <span id="form_collection_fee_gupcollected_note_error" class="text text-danger"></span>
        </div>
    </div>

</div>
</div>
<ul class="fees-list fees-list-in-box">
    <?php
$row_counter  = 1;
$total_amount = 0;
foreach ($feearray as $fee_key => $fee_value) {
    $amount_prev_paid = 0;
    $amount_to_be_pay = $fee_value->amount;

    if ($fee_value->is_system) {
        $amount_to_be_pay = $fee_value->student_fees_master_amount;

    }

    if (is_string(($fee_value->amount_detail)) && is_array(json_decode(($fee_value->amount_detail), true))) {

        $amount_data = json_decode($fee_value->amount_detail);

        foreach ($amount_data as $amount_data_key => $amount_data_value) {
            $amount_prev_paid = $amount_prev_paid + ($amount_data_value->amount + $amount_data_value->amount_discount);
        }

        if ($fee_value->is_system) {
            $amount_to_be_pay = $fee_value->student_fees_master_amount - $amount_prev_paid;

        } else {

            $amount_to_be_pay = $fee_value->amount - $amount_prev_paid;
        }

    }
    $total_amount = $total_amount + $amount_to_be_pay;
    if ($amount_to_be_pay > 0) {
        ?>

        <li class="item">
            <input name="row_counter[]" type="hidden" value="<?php echo $row_counter; ?>">
            <input name="student_fees_master_id_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->id; ?>">
            <input name="fee_groups_feetype_id_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $fee_value->fee_groups_feetype_id; ?>">
            <input class="count_fees_hid" name="fee_amount_<?php echo $row_counter; ?>" type="hidden" value="<?php echo $amount_to_be_pay; ?>">
            <div class="product-info">
                <a href="#" class="product-title"><?php echo $fee_value->name; ?>
                    <span class="pull-right"><input class="fees_amount_tot" name="fee_amount_<?php echo $row_counter; ?>" type="Number" step="0.00" value="<?php echo $amount_to_be_pay; ?>"></span></a>
                <span class="product-description">

                    <?php echo $fee_value->code; ?>

                </span>
            </div>
        </li>

        <?php
}

    $row_counter++;
}
?>
</ul>

<div class="row collect_grp_fees">
    <div class="col-md-8">
       <span class="pull-right butt">
       <?php echo $this->lang->line('total') . " " . $this->lang->line('pay'); ?>
        </span>
    </div>
    <div class="col-md-4">
        <span class="pull-right amount_tot">
                  <?php echo number_format((float) $total_amount, 2, '.', ''); ?>
        </span>

    </div>
    <input type="hidden" value="<?php echo number_format((float) $total_amount, 2, '.', ''); ?>" class="tot_pay">
</div>
<script >
    // fees_amount_tot

    $( document ).ready(function() {
    
      $("input.fees_amount_tot").blur(function(){
         var sum = 0.00;
         
        var tot =  $('.tot_pay').val()
       
              $('input.fees_amount_tot').each(function() {
       
        sum += Number($(this).val());
    });
    if(sum > tot ){
        // alert("not valid")
       alert("Enter Proper value & amount should be float Like 2500.00")

           $('input.fees_amount_tot').each(function() {
        sum += $(this).val("");
        $(".payment_collect").css("display","none")

    });
         $(".amount_tot").html("0");   
           // $(".butt").html("")
    }else{
    $(".amount_tot").html(sum);
     $(".payment_collect").css("display","unset")
        // alert(sum)
    }

  
    // console.log( "ready!" );
  });
});

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