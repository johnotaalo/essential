<?php
switch($this->session->userdata('survey')) {
	case 'ch' :

?>
<div class="page-sidebar nav-collapse collapse">

	<!-- BEGIN SIDEBAR MENU -->
	<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
		<li id="home-parent" class="has-sub start">
			<a href="#"> <i class="fa fa-home"></i> <span class="title"> Analytics Summary</span> </a>
		</li>
		<li id="facility-statistics-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-building"></i> <span class="title">Facility Statistics</span><span class="arrow "></span> </a>
			<ul class="sub">
				<li id="communityStrategy">
					<a href="#" >Community Strategy</a>
				</li>
				<li id="guidelinesAvailabilityCH">
					<a href="#">Guidelines Availability</a>
				</li>
				<li id="TrainedStaffCH">
					<a href="#">Staff Trainings</a>
				</li>
				<li id="childrenServices">
					<a href="#">Services Offered</a>
				</li>
				<li id="dangerSigns">
					<a href="#">Danger Signs</a>
				</li>
				<li id="actionsPerformed">
					<a href="#">Actions Performed</a>
				</li>
				<li id="counselGiven">
					<a href="#">Counsel Given</a>
				</li>
				<li id="tools">
					<a href="#">Tools in a given Unit</a>
				</li>
				<li id="consultation">
					<a href="#">Consultation</a>
				</li>
				<li id="ChHealthServices">
					<a href="#">Health Services</a>
				</li>
				<li id="CertificationA">
					<a href="#">Certification A</a>
				</li>
				<li id="CertificationB">
					<a href="#">Certification B</a>
				</li>
				<li id="IMCIConsultationRoom">
					<a href="#">IMCI Consultation Room</a>
				</li>
			</ul>
		</li>

		<li id="commodities-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Commodities</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="commodityAvailability">
					<a href="#">Commodity Availability</a>
				</li>
				<li id="commodityAvailabilityUnavailability">
					<a href="#">Commodity Reasons For Unavailability</a>
				</li>
				<li id="commodityAvailabilityLocation">
					<a href="#">Commodity Location</a>
				</li>
				<li id="commodityAvailabilityQuantity">
					<a href="#">Commodity Quantity</a>
				</li>
				<!--<li id="CHcommoditySuppliers">
					<a href="#">Commodity Suppliers</a>
				</li>-->
				
			</ul>
		</li>

<li id="bundling-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Bundling</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="bundlingFrequency">
					<a href="#">Bundling Availability</a>
				</li>
				<li id="bundlingUnavailability">
					<a href="#">Bundling Reasons For Unavailability</a>
				</li>
				<li id="bundlingLocation">
					<a href="#">Bundling Location</a>
				</li>
				<li id="bundlingQuantities">
					<a href="#">Bundling Quantities</a>
				</li>
				<li id="bundlingSuppliers">
					<a href="#">Bundling Suppliers</a>
				</li>
			</ul>
		</li>

		<li id="diarrhoea-cases-parent" class="has-sub start ">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Diarrhoea Cases</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="caseNumbers">
					<a href="#">Case Numbers</a>
				</li>
				<li id="caseTreatment">
					<a href="#">Case Treatment</a>
				</li>
			</ul>
		</li>

        <li id="pneumonia-cases-parent" class="has-sub start ">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Pneumonia Cases</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="PnecaseNumbers">
					<a href="#">Case Numbers</a>
				</li>
				<li id="PnecaseTreatment">
					<a href="#">Case Treatment</a>
				</li>
			</ul>
		</li>

		<li id="malaria-cases-parent" class="has-sub start ">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Malaria Cases</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="MalcaseNumbers">
					<a href="#">Case Numbers</a>
				</li>
				<li id="MalcaseTreatment">
					<a href="#">Case Treatment</a>
				</li>
			</ul>
		</li>

		<li id="ORT-Corner-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">ORT Corner</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="ORTCornerAssessment">
					<a href="#">ORT Corner Assessment</a>
				</li>
				<li id="CHEquipmentFrequency">
					<a href="#">ORT Corner Equipment Availability</a>
				</li>
				<li id="CHEquipmentFunctionality">
					<a href="#">ORT Corner Equipment Functionality</a>
				</li>
				<li id="CHEquipmentLocation">
					<a href="#">ORT Corner Equipment Location</a>
				</li>
			</ul>
		</li>
		<li id="supplies-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Supplies</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="CHSuppliesAvailability">
					<a href="#">Supplies Availability</a>
				</li>
				<li id="CHSuppliesLocation">
					<a href="#">Supplies Location</a>
				</li>
				<li id="CHSuppliesSupplier">
					<a href="#">Suppliers</a>
				</li>
			</ul>

		</li>
		<li id="hardware-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Hardware</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="hardwareFrequencyCH">
					<a href="#">Hardware Availability</a>
				</li>
			</ul>

		</li>
		<li id="resources-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Resources</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="resourceFrequencyCH">
					<a href="#">Resource Availability</a>
				</li>
				<li id="resourceLocationCH">
					<a href="#">Resource Location</a>
				</li>
			</ul>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<?php
break;

case 'mnh' :
?>
<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
		<li id="home-parent" class="has-sub start">
			<a href="#"> <i class="fa fa-home"></i> <span class="title"> Analytics Summary</span> </a>
		</li>
		<li id="facility-statistics-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-building"></i> <span class="title">Facility Statistics</span><span class="arrow "></span> </a>
			<ul class="sub">
				<li id="nursesDeployed">
					<a href="#" >Nurses Deployed</a>
				</li>
				<li id="beds">
					<a href="#" >Beds in Facility</a>
				</li>
				<li id="services">
					<a href="#" >Services</a>
				</li>
				<li id="hfm">
					<a href="#" >Health Facility Management</a>
				</li>
				<li id="deliveries">
					<a href="#" >Deliveries</a>
				</li>
				<li id="hiv">
					<a href="#" >HIV Testing</a>
				</li>
				<!--li id="newborn">
					<a href="#" >Newborn Care</a>
				</li>
				<li id="kmc">
					<a href="#" >Kangaroo Mother Care</a>
				</li-->
				<li id="jobaids">
					<a href="#" >Job Aids</a>
				</li>
				<li id="guidelinesAvailabilitymnh">
					<a href="#" >Guidelines Availability</a>
				</li>
				<li id="communitystrategy">
					<a href="#" >Community Strategy</a>
				</li>
				<li id="TrainedStaffMnh">
					<a href="#" >Staff Training</a>
				</li>

			</ul>
		</li>

		<li id="signal-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Signal Functions</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<!--li id="bemonc">
					<a href="#">BemONC Signal Function</a>
				</li-->
				<li id="ceocquestion">
					<a href="#">CEmONC Signal Function</a>
				</li>
				<!--li id="cemoncReason">
					<a href="#">CEmONC Signal Function Challenges</a>
				</li-->
				<li id="bemonc">
					<a href="#">BEmONC Signal Function</a>
				</li>
				<li id="bemoncReason">
					<a href="#">BEmONC Signal Function Challenges</a>
				</li>
				
				
			</ul>

		</li>
		<li id="commodities-parent-mnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Commodities</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="commodityAvailabilityFrequency">
					<a href="#">Commodity Availability</a>
				</li>
				<li id="commodityAvailabilityUnavailability">
					<a href="#">Commodity Reasons For Unavailability</a>
				</li>
				<li id="commodityAvailabilityLocation">
					<a href="#">Commodity Location</a>
				</li>
				<li id="commodityAvailabilityQuantities">
					<a href="#">Commodity Quantities</a>
				</li>
				<li id="commoditySuppliers">
					<a href="#">Commodity Suppliers</a>
				</li>
			</ul>
		</li>
		<li id="equipments-parent-mnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Equipment</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="MNHEquipmentFrequency">
					<a href="#">Equipment Availability</a>
				</li>
				<li id="MNHEquipmentLocation">
					<a href="#">Equipment Location</a>
				</li>
				<li id="MNHEquipmentFunctionality">
					<a href="#">Equipment Functionality</a>
				</li>
			</ul>
		</li>
		<li id="supplies-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Supplies</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="MNHSuppliesAvailability">
					<a href="#">Supplies Availability</a>
				</li>
				<li id="MNHSuppliesLocation">
					<a href="#">Supplies Location</a>
				</li>
				<li id="SuppliesSuppliers">
					<a href="#">Suppliers</a>
				</li>
			</ul>

		</li>
		<li id="hardware-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Hardware</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="hardwareFrequencyMnh">
					<a href="#">Hardware Availability</a>
				</li>
			</ul>

		</li>
		<li id="resources-parentMnh" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-bar-chart"></i> <span class="title">Resources</span> <span class="arrow "></span> </a>
			<ul class="sub">
				<li id="resourcesFrequencyMnh">
					<a href="#">Resources Availability</a>
				</li>
				<li id="resourcesLocationMnh">
					<a href="#">Resources Location</a>
				</li>
			</ul>

		</li>
		
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<?php
break;

case 'hcw' :
?>
<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
	<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
		<li id="home-parent" class="has-sub start">
			<a href="#"> <i class="fa fa-home"></i> <span class="title"> Analytics Summary</span> </a>
		</li>
		
		<li id="facility-statistics-parent" class="has-sub start">
			<a href="javascript:;"> <i class="fa fa-building"></i> <span class="title">Facility Statistics</span><span class="arrow "></span> </a>
			<ul class="sub">
				<li id="IMCIConsultation">
					<a href="#" >Consultation</a>
				</li>
				

			</ul>
		</li>

		
		
	</ul>
	<!-- END SIDEBAR MENU -->
</div>
<?php
break;
}
?>

