<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top" >
    <!-- BEGIN HEADER -->

<script>
    $('#survey_type').change(function(){
       // alert('changed');
    });
</script>

    <!-- END HEADER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid">
        <!-- BEGIN SIDEBAR -->

        <!-- END SIDEBAR -->
        <!-- BEGIN PAGE -->
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>portlet Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here will be a configuration form</p>
                </div>
            </div>
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE CONTAINER-->
            <div class="container-fluid" data-spy="scroll" data-target="#sectionList">
                <!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">

                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <div class="ui message info">
                          <i class="icon attention"></i>The information below is gathered from all facilities that have <b><i>entered</i></b> the assessment information onto the MNCH Web Tool.
                        </div>

                        <ul class="breadcrumb" data-start="border-bottom:0;opacity:1;position:relative" data-top="opacity:0.9;z-index:1000;position:fixed;top:0;width:100%;border-bottom:1px solid #ddd">

                                <div class="ui selection dropdown">
                                    <input id="survey_type" type="hidden">
                                    <i class="icon book"></i>
                                    <div class="default text">Choose a Survey</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                      <div class="item" data-value="mnh">MNH</div>
                                      <div class="item" data-value="ch">CH</div>
                                      <div class="item" data-value="hcw" id = "imci">IMCI Follow Up</div>
                                    </div>
                                </div>
                                <?php
                                    $class = "ui selection dropdown disabled"
                                ?>

                                <div class="<?php echo $class; ?>" id = "x">
                                <i class="icon time"></i>
                                    <input id="survey_category" type="hidden">
                                    <div class="default text">Choose a Survey Category</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">
                                      <div class="item" data-value="baseline">Baseline</div>
                                      <div class="item" data-value="mid-term">Mid-Term</div>
                                      <div class="item" data-value="end-term" >End-Term</div>
                                    </div>
                                </div>
                               <div class="ui selection dropdown">
                               <i class="icon map marker"></i>
                                    <input id="county_select" type="hidden">
                                    <div class="default text">Choose a County</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">

                                    </div>
                                </div>
                                <div class="ui selection dropdown">
                                <i class="icon map marker"></i>
                                    <input id="sub_county_select" type="hidden">
                                    <div class="default text">Choose a Sub County</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">

                                    </div>
                                </div>
                                <div class="ui selection dropdown">
                                <i class="icon hospital"></i>
                                    <input id="facility_select" type="hidden">
                                    <div class="default text">Choose a Facility</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu">

                                    </div>
                                </div>

                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <div class="row">
                    <?php //$this->load->view('segments/analytics_sidebar_menu');?>
                    <?php $this->load->view($analytics_content_to_load);?>
                </div>

                <!-- END PAGE CONTENT-->
            </div>
            <!-- BEGIN PAGE CONTAINER-->
        </div>
        <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS -->
    <?php //$this->load->view('segments/analytics_js'); ?>
    <script src="<?php echo base_url();?>assets/javascripts/analytics.js"></script>

    <script type="text/javascript" src = "<?php echo base_url(); ?>assets/bower_components/semantic-ui/build/packaged/javascript/semantic.min.js"></script>
    <script>
        var base_url = "<?php echo base_url();?>";
        var county   = "<?php echo $this->session->userdata('county_analytics');?>";
        var survey   = "<?php echo $this->session->userdata('survey')?>";
        var survey_category   = "<?php echo $this->session->userdata('survey_category')?>";
        $(document).ready(startAnalytics(base_url,county,survey,survey_category));
        $('#survey_type').change(function(){
            if($('#survey_type').val() == 'hcw')
            {
                $('#x').dropdown('destroy');
            }
        });
    </script>
    <!-- END JAVASCRIPTS -->
    <?php //$this->load->view($modals)?>
</body>
<!-- END BODY -->
</html>
