<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-download"></i> <?php echo $this->lang->line('download_center'); ?>         </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix">Video List</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
     
                </div>
            </div>    
            <!--VIDEOO-->
             <?php if($list){
                                    foreach ($list as $data) {
                                        ?>
                        <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $data['title'] ?></h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
           <video
   
    class="video-js vjs-big-play-centered"
    controls
    preload="auto"
    width="369"
    height="264"
  
    data-setup="{}"
  >
    <source src="<?php echo base_url(); ?>user/content/download/<?php echo $data['file'] ?>" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that</p>
  </video>
                </div>
            </div> 
            <?php } } ?>
            <!--VIDEO-->
        </div>
        <div class="row">          
            <div class="col-md-12">
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#upload_date').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
        $("#btnreset").click(function () {
            $("#form1")[0].reset();
        });
    });
</script>
<script>
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
</script>