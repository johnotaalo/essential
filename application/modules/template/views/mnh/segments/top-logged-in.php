<div id="network">
<li><i class="icon-calendar"></i><?php echo '<strong>'.date("l, d F Y").'</strong>';?></li>
<li><i class="icon-user"></i>Logged on as, <?php echo '<strong>Respondent</strong> for <strong>'. $this -> session -> userdata('dName').' District</strong>';?></li>

        <li class="current-tab">
        <a href="<?php echo base_url().'assessment';?>"><i class="icon-building"></i>Total Facilities:</a> <strong><?php echo  $this -> session -> userdata('fCount');?></strong><a id="logout" href="<?php echo base_url().'mnch/session/close';?>" >Logout</a>
        </li>


</div>