<div class="panel-group" id="page_sidebar">
    <h6>ANALYTICS MENU</h6>
    <?php
switch($this->session->userdata('survey')) {
    case 'mnh' :

    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#national_outlook">
                    National Outlook <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="national_outlook" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="sub">
                    <li id="reportingSummary">
                        <a href="#" >Reporting Summary</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#facility_statistics">
                    Facility Statistics <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="facility_statistics" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#signal_functions">
                    Signal Functions <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="signal_functions" class="panel-collapse collapse">
            <div class="panel-body">
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


                </ul>   </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#commodities">
                    Commodities <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="commodities" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="MNHCommodityAvailabilityFrequency">
                        <a href="#">Commodity Availability</a>
                    </li>
                    <li id="MNHCommodityAvailabilityUnavailability">
                        <a href="#">Commodity Reasons For Unavailability</a>
                    </li>
                    <li id="MNHCommodityAvailabilityLocation">
                        <a href="#">Commodity Location</a>
                    </li>
                   <!-- <li id="MNHCommodityAvailabilityQuantities">
                        <a href="#">Commodity Quantities</a>
                    </li>
                    <li id="MNHcommoditySuppliers">
                        <a href="#">Commodity Suppliers</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#equipment">
                    Equipment <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="equipment" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#supplies">
                    Supplies <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="supplies" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#hardware">
                    Hardware <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="hardware" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="HardwareFrequencyMNH">
                        <a href="#">Hardware Availability</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#resources">
                    Resources <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="resources" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="resourcesFrequencyMnh">
                        <a href="#">Resources Availability</a>
                    </li>
                    <li id="resourcesLocationMnh">
                        <a href="#">Resources Location</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    break;
    case 'ch':

    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#national_outlook">
                    National Outlook <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="national_outlook" class="panel-collapse collapse in">
            <div class="panel-body">
                <ul class="sub">
                    <li id="reportingSummary">
                        <a href="#" >Reporting Summary</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#facility">
                    Facility Statistics <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="facility" class="panel-collapse collapse">
            <div class="panel-body">
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
                    <li id="IMCIConsultation">
                    	<a href = "#">IMCI Consultation</a>
                    </li>
                    <li id="ChHealthServices">
                    	<a href = "#">Health Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#commodities">
                    Commoditites <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="commodities" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="CHCommodityAvailabilityFrequency">
                        <a href="#">Commodity Availability</a>
                    </li>
                    <li id="CHCommodityAvailabilityUnavailability">
                        <a href="#">Commodity Reasons For Unavailability</a>
                    </li>
                    <li id="CHCommodityAvailabilityLocation">
                        <a href="#">Commodity Location</a>
                    </li>
                    <!--<li id="CHCommodityAvailabilityQuantities">
                        <a href="#">Commodity Quantity</a>
                    </li>-->
                    <!--<li id="CHcommoditySuppliers">
<a href="#">Commodity Suppliers</a>
</li>-->

                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#bundling">
                    Bundling <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="bundling" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#case_management">
                    Case Management <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="case_management" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="caseNumbers">
                        <a href="#">Diarrhoea Case Numbers</a>
                    </li>
                    <li id="caseTreatment">
                        <a href="#">Diarrhoea Case Treatment</a>
                    </li>
                    <li id="PnecaseNumbers">
                        <a href="#">Pneumonia Case Numbers</a>
                    </li>
                    <li id="PnecaseTreatment">
                        <a href="#">Pneumonia Case Treatment</a>
                    </li>
                    <li id="MalcaseNumbers">
                        <a href="#">Malaria Case Numbers</a>
                    </li>
                    <li id="MalcaseTreatment">
                        <a href="#">Malaria Case Treatment</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#ort-corner">
                    ORT Corner <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="ort-corner" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#supplies">
                    Supplies <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="supplies" class="panel-collapse collapse">
            <div class="panel-body">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#resources">
                    Resources <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="resources" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="resourcesFrequencyCH">
                        <a href="#">Resource Availability</a>
                    </li>
                    <li id="resourcesLocationCH">
                        <a href="#">Resource Location</a>
                    </li>
                    <li id = "FacilityOwnerAll">
                    	<a href="#">Ownership</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    break;
    case 'hcw':
    ?>
        <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#facility">
                    Facility Statistics <i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div id="facility" class="panel-collapse collapse">
            <div class="panel-body">
                <ul class="sub">
                    <li id="IMCIConsultation">
                        <a href="#" >Consultation</a>
                    </li>
                    <li id="IMCIInterview">
                        <a href="#">Interview</a>
                    </li>
                    <li id="IMCICertificate">
                        <a href="#">Certificate</a>
                    </li>
                    <li id="IMCICertificateA">
                        <a href="#">Certificate A</a>
                    </li>
                    <li id="IMCICertificateB">
                        <a href="#">Certificate B</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>






    <?php
    break;
}
    ?>
</div>
