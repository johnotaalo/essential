<div id="header">
    <div id="site-title">
       <?php 
        $this->load->view('banner'); 
        $survey = $this->session->userdata('survey');
        ?>
</div>

    <div class="breadcrumb" id="survey_crumb" data-start="border-bottom:0;opacity:1;position:relative" data-top="opacity:0.9;z-index:1000;position:fixed;top:0;width:100%;border-bottom:1px solid #ddd">
    <li><a id="li_survey"href="<?php echo base_url('home'); ?>">Home</a></li>
    <li><a id="li_facilities" href="<?php echo base_url('mnch/takesurvey');?>"> <?php if($this->session->userdata('survey') == 'hcw'){echo $this -> session -> userdata('county');}else{echo $this -> session -> userdata('dName'); }?> <?php if($survey != 'hcw'){ ?>Facilities <?php } else {echo "HCW Workers"; } ?></a></li>
<div class="ui label mini" >
<i class="icon book"></i>
  <span id="current_survey"></span>
</div>
<?php if($survey != 'hcw'){ ?>
<div class="ui button mini teal">
  <i class="icon hospital link"></i>Facilities Targeted
  <a class="detail"><span id="targeted">0</span></a>
</div>
<div class="ui button mini green link">
  <i class="icon hospital"></i>Facilities Completed
  <a class="detail"><span id="finished">0</span></a>
</div>
<div class="ui button mini orange">
  <i class="icon hospital link"></i>Facilities Not Completed
  <a class="detail orange"><span id="not-finished">0</span></a>
</div>
<div class="ui button mini red">
  <i class="icon hospital link"></i>Facilities Not Started
  <a class="detail"><span id="not-started">0</span></a>
</div>
<div class="ui label mini">
  <i class="icon hospital link"></i>Percentage Completed
  <a class="detail"><span id="percentage_completed">0</span></a>
</div>
<div class="ui blue active progress" id="district_progress">
  <div class="bar" ></div>
</div>
<?php } else {?>

<div class="ui button mini teal">
  <i class="icon hospital link"></i>Total HCWs
  <a class="detail"><span id="hcws">0</span></a>
</div>
<div class="ui button mini green link">
  <i class="icon hospital"></i> Total Assessed
  <a class="detail"><span id="assessed">0</span></a>
</div>
<div class="ui button mini orange">
  <i class="icon hospital link"></i> Total Certified
  <a class="detail orange"><span id="certified">0</span></a>
</div>
<div class="ui button mini red">
  <i class="icon hospital link"></i>Total for ToT
  <a class="detail"><span id="tot">0</span></a>
</div>

<div class="ui button mini red">
  <i class="icon hospital link"></i>Total for Mentorship
  <a class="detail"><span id="mentorship">0</span></a>
</div>

<div class="ui button mini red">
  <i class="icon hospital link"></i>Total for Declined
  <a class="detail"><span id="declined">0</span></a>
</div>

<div class="ui button mini red">
  <i class="icon hospital link"></i>Total Cannot be Traced
  <a class="detail"><span id="cannottrace">0</span></a>
</div>

<?php } ?>
</div>
</div>
