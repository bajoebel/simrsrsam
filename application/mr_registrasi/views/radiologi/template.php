<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>SIMRS V.2</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/select2.min.css" />
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/chosen.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker3.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/daterangepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-colorpicker.min.css" />
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.gritter.min.css" />
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.autocomplete.css"/>
        
        <script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>
        
        <script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
                
                <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
                <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/dataTables.select.min.js"></script>
                
                <script src="<?php echo base_url() ?>assets/js/wizard.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery-additional-methods.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootbox.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
                
                <script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/spinbox.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/daterangepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/autosize.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.inputlimiter.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-tag.min.js"></script>
                <script src="<?php echo base_url() ?>assets/js/markdown.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-markdown.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap-wysiwyg.min.js"></script>
                
                <script src="<?php echo base_url() ?>assets/js/bootbox.js"></script>
                
                <script src="<?php echo base_url() ?>assets/js/jquery.autocomplete.js"></script>
                
                <script src="<?php echo base_url() ?>assets/js/spin.js"></script>
                <script src="<?php echo base_url() ?>assets/js/jquery.gritter.min.js"></script>
                
		<!-- ace scripts -->
		<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>
                <script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#foto").change(function (){
                var url = "<?php echo site_url('radiologi/add_ajax_bacaan');?>/"+$(this).val();
                if($("#foto").val() == ""){
                $('#bacaan').html("");
                }else{
                $('#bacaan').load(url);
                }
                return false;
            });
        });
    </script>
    </head>
<body class="no-skin">
    <?php echo $_header;?>
    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
                        try{ace.settings.loadState('main-container')}catch(e){}
        </script>
        
    <?php echo $_menu;?>
    <?php echo $_content;?>
    
<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">SIMRS</span>
                Application &copy; 2017
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
                <a href="#">
                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                </a>
            </span>
        </div>
    </div>
</div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div>    
	</body>
</html>