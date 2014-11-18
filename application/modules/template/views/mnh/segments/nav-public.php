<div id="header">
    <div class="right" id="toolbar"></div>


    <div id="site-title">
    <?php $this->load->view('banner'); ?>


    </div>

    <div id="navigation">
        <nav class="" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo base_url('mnch/analytics'); ?>"><i class="icon home"></i>Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('mnch/takesurvey'); ?>"><i class="icon ion-compose"></i>Take Survey</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('mnch/analytics'); ?>"><i class="icon ion-pie-graph"></i>View Analytics</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('mnch/home'); ?>"><i class="icon ion-arrow-graph-up-right"></i>Reporting Progress</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon ion-document-text"></i> Offline Forms <b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <li id="mnh-form">
                                    <a href="#"> 1. Maternal Neonatal Health - Emergency Obstetric Care  </a>
                                </li>
                                <li id="mch-form">
                                    <a href="#"> 2. Child Health - Diarrhoea, Treatment Scale Up  </a>
                                </li>
                                <li id="hcw-form">
                                    <a href="#"> 3. Follow-Up Tool after IMCI Training </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $this -> config -> item('project_url'); ?>"><i class="icon ion-speedometer"></i>Program Monitoring Tool</a>
                        </li>
                        <li>
                            <a href="http://www.health-cmp.or.ke"><i class="icon ion-ios7-box"></i>HCMP</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/login'); ?>" id="upload"><i class="icon ion-gear-a"></i>Admin</a>
                        </li>
                    </ul>


                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>

</div>
<script>
    $(document).ready(function(){
        $('#mnh-form').click(function(){
            window.open('<?php echo base_url();?>survey/load/offline/mnh');
        });
        $('#mch-form').click(function(){
            window.open('<?php echo base_url();?>survey/load/offline/ch');
        });
        $('#hcw-form').click(function(){
            window.open('<?php echo base_url();?>survey/load/offline/hcw');
        });

        $('#mnh-completed').click(function(){
            window.open('<?php echo base_url();?>c_statistics/reportingFacilitiesNew/complete/mnh/baseline/');
        });
        $('#mnh-partially').click(function(){
            window.open('<?php echo base_url();?>c_statistics/reportingFacilitiesNew/partial/mnh/baseline/');
        });

    });
</script>
