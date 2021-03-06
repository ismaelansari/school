<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<style type="text/css">
    /*REQUIRED*/
    .carousel-row {
        margin-bottom: 10px;
    }
    .slide-row {
        padding: 0;
        background-color: #ffffff;
        min-height: 150px;
        border: 1px solid #e7e7e7;
        overflow: hidden;
        height: auto;
        position: relative;
    }
    .slide-carousel {
        width: 20%;
        float: left;
        display: inline-block;
    }
    .slide-carousel .carousel-indicators {
        margin-bottom: 0;
        bottom: 0;
        background: rgba(0, 0, 0, .5);
    }
    .slide-carousel .carousel-indicators li {
        border-radius: 0;
        width: 20px;
        height: 6px;
    }
    .slide-carousel .carousel-indicators .active {
        margin: 1px;
    }
    .slide-content {
        position: absolute;
        top: 0;
        left: 20%;
        display: block;
        float: left;
        width: 80%;
        max-height: 76%;
        padding: 1.5% 2% 2% 2%;
        overflow-y: auto;
    }
    .slide-content h4 {
        margin-bottom: 3px;
        margin-top: 0;
    }
    .slide-footer {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 78%;
        height: 20%;
        margin: 1%;
    }
    /* Scrollbars */
    .slide-content::-webkit-scrollbar {
        width: 5px;
    }
    .slide-content::-webkit-scrollbar-thumb:vertical {
        margin: 5px;
        background-color: #999;
        -webkit-border-radius: 5px;
    }
    .slide-content::-webkit-scrollbar-button:start:decrement,
    .slide-content::-webkit-scrollbar-button:end:increment {
        height: 5px;
        display: block;
    }
</style>

<div class="content-wrapper" style="min-height: 946px;">

    <section class="content-header">
        <h1>
            <i class="fa fa-bus"></i> <?php echo $this->lang->line('transport'); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('reports/_online_examinations');?>
        <div class="row">
            <div class="col-md-12">
                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                      <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>

                     <form role="form" action="<?php echo site_url('report/onlineexamrank') ?>" method="post" class="">
                         <div class="box-body">
                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->flashdata('msg')) {?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php }?>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('exam')?><small class="req"> *</small></label>
                                        <select  id="exam_id" name="exam_id" class="form-control"  >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                                                            <?php
                                                foreach ($examList as $exam_key => $exam_value) {
                                                    ?>
                                                                                                <option value="<?php echo $exam_value->id; ?>"<?php if (set_value('exam_id') == $exam_value->id) {
                                                        echo "selected=selected";
                                                    }
                                                    ?>><?php echo $exam_value->exam; ?></option>
                                                                                                <?php
                                                $count++;
                                                }
                                                ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('class'); ?></label>
                                        <select  id="class_id" name="class_id" class="form-control"  >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
foreach ($classlist as $class) {
    ?>
                                                <option value="<?php echo $class['id'] ?>"<?php if (set_value('class_id') == $class['id']) {
        echo "selected=selected";
    }
    ?>><?php echo $class['class'] ?></option>
                                                <?php
$count++;
}
?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('section'); ?></label>
                                        <select  id="section_id" name="section_id" class="form-control" >
                                            <option value=""   ><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                    </div>
                                </div>
                            
                        
                        <div class="col-sm-12">
                          <div class="form-group">  
                            <button type="submit" name="action" value ="search" class="btn btn-primary pull-right btn-sm"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                          </div>  
                        </div>
                      </div>
                    </div>
                    </form>
             

            <div class="">
                <div class="box-header ptbnull"></div>
                <div class="box-header ptbnull">
                    <h3 class="box-title titlefix"><i class="fa fa-money"></i> <?php echo $this->lang->line('online')." ".$this->lang->line('exam')." ".$this->lang->line('rank')." ".$this->lang->line('report'); ?></h3>
                </div>
                <div class="box-body table-responsive">
                 <div class="download_label"><?php echo $this->lang->line('online')." ".$this->lang->line('exam')." ".$this->lang->line('rank')." ".$this->lang->line('report')."<br>";$this->customlib->get_postmessage(); ?></div>
                     <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('rank')?></th>
                                        <th><?php echo $this->lang->line('student')?></th>
                                        <th><?php  echo $this->lang->line('admission_no')?></th>
                                        <th><?php  echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section') ?></th>
                                        <th><?php echo $this->lang->line('exam') ?></th>
                                        <th><?php echo $this->lang->line('correct')." ".$this->lang->line('answer') ?></th>
                                        <th><?php echo $this->lang->line('incorrect')." ".$this->lang->line('answer') ?></th>
                                        <th><?php echo $this->lang->line('total')." ".$this->lang->line('question')?></th>
                                        <th><?php echo $this->lang->line('percentage')?></th>
                                        <th><?php echo $this->lang->line('result'); ?></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(!empty($final_result)){
 $s=1;
                                  //  print_r($final_result);die;
                                   $getrecord=count($final_result)-1;

                                    $last=$getrecord;
                                    $status="";
                                    for($i=1;$i<=count($final_result);$i++){
                                        $onlineexam_student_id=$final_result[$last]['onlineexam_student_id'];
                                        if(!empty($final_result[$last]['percentage'])){
                                             if($final_result[$last]['percentage']>=$studentrecord[$onlineexam_student_id]['passing_percentage']){
                                            $status="Pass";
                                        }else{
                                             $status="Fail";
                                        }
                                        }
                                       
                                    ?>
                                    <tr>
                                        <td><?php echo $s++;?></td>
                                        <td><?php if(!empty($studentrecord[$onlineexam_student_id]['firstname'])){
                                            echo  $studentrecord[$onlineexam_student_id]['firstname']." "; } if(!empty($studentrecord[$onlineexam_student_id]['lastname'])){
                                            echo  $studentrecord[$onlineexam_student_id]['lastname']; }?></td>
                                        <td><?php if(!empty($studentrecord[$onlineexam_student_id]['admission_no'])){ echo  $studentrecord[$onlineexam_student_id]['admission_no']; }?></td>
                                        <td><?php if(!empty($studentrecord[$onlineexam_student_id]['class'])){ echo  $studentrecord[$onlineexam_student_id]['class']; }?></td>
                                        <td><?php if(!empty($studentrecord[$onlineexam_student_id]['section'])){ echo  $studentrecord[$onlineexam_student_id]['section']; }?></td>
                                         <td><?php if(!empty($studentrecord[$onlineexam_student_id]['exam'])){ echo  $studentrecord[$onlineexam_student_id]['exam']; }?></td>
                                        <td><?php echo $final_result[$last]['correct_answer'] ?></td>
                                        <td><?php echo $final_result[$last]['incorrect_answer'] ?></td>
                                        <td><?php echo $final_result[$last]['total_questions'] ?></td>
                                        <td><?php echo round($final_result[$last]['percentage'],1) ?></td>
                                        <td><?php echo $status; ?></td>
                                    </tr>
                                  <?php
                                   $last--;
                                    }
                                     } ?>
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
<script>
    <?php 
    if($search_type=='period'){
        ?>

          $(document).ready(function () {
            showdate('period');
          });

        <?php
    }
    ?>
   
    </script>

    <script type="text/javascript">


    $(document).ready(function () {

        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id', 0) ?>';
        var hostel_id = $('#hostel_id').val();
        var hostel_room_id = '<?php echo set_value('hostel_room_id', 0) ?>';

        getSectionByClass(class_id, section_id);
    });

    $(document).on('change', '#class_id', function (e) {
        $('#section_id').html("<option><?php echo $this->lang->line('select'); ?></option>");
        var class_id = $(this).val();
        getSectionByClass(class_id, 0);
    });





    function getSectionByClass(class_id, section_id) {

        if (class_id != "") {
            $('#section_id').html("<?php echo $this->lang->line('select'); ?>");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                beforeSend: function () {
                    $('#section_id').addClass('dropdownloading');
                },
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                },
                complete: function () {
                    $('#section_id').removeClass('dropdownloading');
                }
            });
        }
    }



</script>