<?php
//include ('c_load.php');
class C_Pdf extends MY_Controller {
	var $rows, $combined_form, $message;

	public function __construct() {
		parent::__construct();
		//print var_dump($this->tValue); exit;
		$this -> rows = '';
		$this -> combined_form;

	}

	public function index() {
	}

	public function get_mnh_form() {
		$this -> combined_form .= '
		<p style="display:true" class="message success">
			SECTION 1 of 7: FACILITY INFORMATION
		</p>
		<table border="2">

			<thead>
				<th colspan="9">FACILITY INFORMATION</th>
			</thead>
			<tbody>
				<tr>
					<td>Facility Name </td><td>
					<input type="text" size="40">
					</td><td>Facility Level </td><td><!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
					<input type="text" size="40" >
					</td><td>County </td>
					<td>
					<input type="text" size="40" >
					</td>
				</tr>
				<tr>
					<td>Facility Type </td>
					<td>
					<input type="text" size="40" >
					</td>
					<td>Owned By </td>
					<td>
					<input type="text" size="40" >
					</td>

					<td>District/Sub County </td>
					<td>
					<input type="text" size="40" >
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<th colspan="3" >FACILITY CONTACT INFORMATION</th>
			</thead>
			<tbody>
				<tr >
					<th scope="col" colspan="2" >CADRE</th>
					<th>NAME</th>
					<th >MOBILE</th>
					<th >EMAIL</th>
				</tr>
				<tr>
					<td  colspan="2">Incharge </td><td>
					<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
					</td><td>
					<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
					</td>
				</tr>
				<tr>
					<td  colspan="2">MCH </td><td>
					<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
					</td><td>
					<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
					</td>
				</tr>
				<tr>
					<td  colspan="2">Maternity </td><td>
					<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
					</td>
					<td>
					<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
					</td>
				</tr>
			</tbody>
		</table>	
		
		
	
			
			
			<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Nurses</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this -> nurses . '
		</table>	
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Beds</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this -> beds . '
		</table>
		<table>
			<thead>
				
					<th colspan="2" >PROVISION OF Services</th>
			
				<tr>
					<th >QUESTION</th>
					<th>RESPONSE</th>

				</tr>
			</thead>
			' . $this -> servicesPDF . '
		</table>	
		
		
		<table>
		<tr>
		<th colspan="12" >Health Facility Management</th>
		</tr>
		<tr>		
		<th colspan="7">QUESTION</th>
		<th colspan="5">RESPONSE</th>	
		</tr>
		' . $this -> mnhCommitteeAspectSectionPDF . '
	</table>
	<table>
		<tr>
			<td>
				<th> DOES THIS FACILITY CONDUCT DELIVERIES?</th>
			</td>
			
				
					<td> Yes
					<input type="checkbox">
					No
					<input type="checkbox">
					</td>
				</tr>
			
		</table>
		<table>

				<thead>
				<tr>
					<th colspan ="12">IF NO, WHAT ARE THE MAIN REASONS FOR NOT CONDUCTING DELIVERIES? </br>(multiple selections allowed)</th>
			</tr>
				<tr>
					<th colspan ="2">Inadequate skill</th>
					<th colspan ="2">Inadequate staff</th>
					<th colspan ="2"> Inadequate infrastructure </th>
					<th colspan="2">Inadequate Equipment</th>
					<th colspan ="2"> Inadequate commodities and supplies</th>
					<th colspan ="2"> Other (Please specify)</th>
				</tr>
	</thead>
				<tr>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesSkill" value="1" class="cloned" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="6" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesInfra" value="2" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesCommo" value="3" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesequiip" value="5" />
					</td>
					<td style ="text-align:center;" colspan ="2">
					<input type="checkbox" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="4" />
					<input type="text" name="facRsnNoDeliveries[]" id="rsnDeliveriesOther" value="" />
					</td>

				</tr>
			</table>
	</div><!--\.the section-1 -->

	<div id="Yes" class="step">
		<input type="hidden" name="step_name" value="section-2"/>
		<p style="display:true" class="message success">
			SECTION 2 of 7: DELIVERIES CONDUCTED DATA, PROVISION OF BEmONC FUNCTIONS
		</p>
		<table>

			<thead>
				<tr>
					<th colspan="13" >INDICATE THE NUMBER OF DELIVERIES CONDUCTED IN THE FOLLOWING PERIODS </th>
				</tr>
				<tr>
					<th> MONTH</th><th> JANUARY</th><th>FEbrUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th><th> JULY</th><th> AUGUST</th>
					<th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
				</tr>
			</thead>
			<tr>
				<td>2013</td>
				<td style ="text-align:center;">
				<input type="text" id="dnjanuary_13" size="8" name="dnjanuary_13" class="cloned numbers"/>
				</td>

				<td style ="text-align:center;">
				<input type="text" id="dnfebruary_13" name="dnfebruary_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnmarch_13" name="dnmarch_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnapril_13" name="dnapril_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnmay_13" name="dnmay_13" size="8"class="cloned numbers" />
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnjune_13" name="dnjune_13" size="8"class="cloned numbers" />
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnjuly_13" size="8" name="dnjuly_13" class="cloned numbers" >
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnaugust_13" size="8" name="dnaugust_13" class="cloned numbers" >
				</td>
				<td  style ="text-align:center;">
				<input type="text" id="dnseptember_13" size="8" name="dnseptember_13" class="cloned numbers" >
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnoctober_13" size="8" name="dnoctober_13" class="cloned numbers" >
				</td>
				<td style ="text-align:center;" width="15">
				<input type="text" id="dnnovember_13" size="8" name="dnnovember_13" class="cloned numbers">
				</td>

				<td style ="text-align:center;">
				<input type="text" id="dndecember_13" size="8" name="dndecember_13" class="cloned numbers" >
				</td>
			</tr>
		</table>
       
		<table>
			<thead>
				<tr>
					<th colspan="14" >PROVISION OF BEmONC SIGNAL FUNCTIONS  IN THE LAST THREE MONTHS </th>
				</tr>
				<tr>

					<th  colspan="7">SIGNAL FUNCTION</th>
					<th   colspan="2"> WAS IT CONDUCTED? </th>
					<th  colspan="5">INDICATE <span style="text-decoration:underline">PRIMARY</span> CHALLENGE</th>

				</tr>
			</thead>
			' . $this -> signalFunctionsSectionPDF . '
		</table>
	
<table>
	
		<tr>
			<th colspan="12" >PROVISION OF CEmONC SERVICES IN THE LAST THREE MONTHS</th>
		</tr>
		<tr>		
		<th colspan="7">QUESTION</th>
		<th colspan="5">RESPONSE</th>	
		</tr>
		' . $this -> mnhCEOCAspectsSectionPDF . '
	</table>
	<table >
		
				<tr>
					<th colspan="12" >PROVISION OF HIV Testing and Counselling</th>
				</tr>
				<tr>
					<th style="width:35%">QUESTION</th>
					<th style="width:65%;text-align:left">RESPONSE</th>

				</tr>
	
			' . $this -> mnhHIVTestingAspectsSectionPDF . '
		</table>

		<table >
			<thead>
				<tr>
					<th colspan="12" >PROVISION OF Newborn Care</th>
				
				</tr>
				<tr>
					<th colspan="7">QUESTION</th>
					<th colspan="5">RESPONSE</th>
				</tr>
</thead>
				
			
			' . $this -> mnhNewbornCareAspectsSectionPDF . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="2" >PROVISION OF Kangaroo Mother Care</th>
				
				</tr>
				<tr>
					<th colspan="1">QUESTION</th>
					<th colspan="1">RESPONSE</th>
				</tr>
</thead>
				
			
			' . $this -> mnhKangarooMotherCarePDF . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="12" >Preparedness for Delivery</th>
				</tr>
				<tr>
					<th colspan="12" style="background=#fff"> 
					<strong>Criteria : </strong>Adult Resuscitation Kit Complete, Working and Clean	; Newborn Resuscitation Kit Complete, working and clean;
				 Receiving Place ; Adequate Light ; No draft(cold air); Clean (delivery beds and all surfaces)	; Waste Disposal System	
				; Sterilization color-coded	;Sharp Container; Privacy		
					</th>
				</tr>
				<tr>
					<th style="width:35%">QUESTION</th>
					<th style="width:65%;text-align:left">RESPONSE</th>

				</tr>
			</thead>
			' . $this -> mnhPreparednessAspectsSectionPDF . '
		</table>
		<table >
			<thead>
				<tr>
					<th colspan="12" >GUIDELINES AVAILABILITY</th>
				</tr>
				<tr>
					<th style="width:35%">ASPECTS</th>
					<th style="width:35%;text-align:left">RESPONSE</th>
					<th style="width:30%;text-align:left">QUANTITY</th>

				</tr>
			</thead>
			' . $this -> mnhGuidelinesAspectsSectionPDF . '
		</table>		
		<table >
			<thead>
				<tr>
					<th colspan="12" >JOB AIDS</th>
				</tr>
				<tr>
					<th style="width:35%">ASPECTS</th>
					<th style="width:35%;text-align:left">RESPONSE</th>
					<th style="width:30%;text-align:left">QUANTITY</th>

				</tr>
			</thead>
			' . $this -> mnhJobAidsAspectsSectionPDF . '
		</table>
		<table class="centre">
			<thead><tr>
				<th colspan="2" >COMMUNITY STRATEGY </th>
					</tr><tr>
				<th  colspan="1" >ASPECT</th>
				<th   colspan="1" > RESPONSE </th>	
			</tr>		
			</thead>
			' . $this -> mnhCommunityStrategySectionPDF . '
	</table>
		
	</div><!--\.section 2-->
<p style="margin-top:100px"></p>
<div id="section-3" class="step">
		<p style="display:true" class="message success">
			SECTION 3 of 7: COMMODITY AVAILABILITY
		</p>
		<table   class="centre persist-area" >
			<thead>
				<tr class="persist-header">
					<th colspan="12">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
				</tr>

				<tr>
					<th rowspan="2" >Commodity Name</th>
					<th rowspan="2" >Commodity Unit</th>
					<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th rowspan="2" >Available Quantities</th>
					<th rowspan="2" > Main Supplier </th>
					<th rowspan="2"> Main Reason For  Unavailability </th>

				</tr>
				<tr>
					<th >Available</th>
					<th>Not Available</th>
					<th>Delivery room</th>
					<th>Pharmacy</th>
					<th>Store</th>
					<th>Other</th>
					<th>Not Applicable</th>
					

				</tr>
			</thead>
			' . $this -> commodityAvailabilitySectionPDF . '

		</table>
	</div><!--\.section-3-->

	<div id="section-4" class="step">
		<input type="hidden" name="step_name" value="section-4"/>
		<p style="display:true" class="message success">
			SECTION 4 of 7: STAFF TRAINING
		</p>
		<table >
			<thead>
			<tr>
			<th colspan="5"  >IN THE LAST 2 YEARS, HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th>
			</tr>
			<tr>
		<th colspan ="2" style="text-align:left"> TRAININGS</th>
		<th style="text-align:left">Number Trained before 2010</th>
		<th style="text-align:left">Number Trained after 2010</th>
		<th colspan ="1" style="text-align:left"><div style="width: 500px" >How Many Of The Total Staff Members 
		Trained are still Working in the Marternity Unit?</div></th>
		</tr>
		</thead>
				
			' . $this -> trainingGuidelineSection . '

		</table>
	</div><!--\.section-4-->
<p style="margin-top:100px"></p>
	<div id="section-5" class="step">
		<input type="hidden" name="step_name" value="section-5"/>
		<p style="display:true" class="message success">
			SECTION 5 of 7: COMMODITY USAGE
		</p>
		<table >
			<thead>
				<tr>
					<th colspan="11"> IN THE LAST 3 MONTHS INDICATE THE USAGE, NUMBER OF TIMES THE COMMODITY WAS NOT AVAILABLE.</br>
					WHEN THE COMMODITY WAS NOT AVAILABLE WHAT HAPPENED? </th>
				</tr>
				<tr >
					<th colspan="2" rowspan="2">
					<div style="width: 100px" >
						Commodity Name
					</div></th>
					<th rowspan="2"  >					
						Unit Size
					</th>
					<th>					
						Usage
					</th>
					<th  colspan="2">
						Number Of Times the commodity was unavailable
					</th>
					<th  colspan="5">
						When the commodity was not available what happened?
						</br>
						<strong>(Multiple Selections Allowed)</strong>
					</th>

				</tr>

				<tr >
					
					<th colspan="1">Total Units Used</th>
					<th colspan="2">Times Unavailable </th>

					<th colspan="1">
					<div style="width: 100px" >
						Patient purchased the commodity privately
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						Facility purchased the commodity privately
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						Facility received the commodity from another facility
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						The procedure was not conducted
					</div></th>
					<th colspan="1">
					<div style="width: 100px" >
						The procedure was conducted without the commodity
					</div></th>

				</tr>
			</thead>
			' . $this -> commodityUsageAndOutageSectionPDF . '
		</table>
	</div><!--\.section-5-->
	<div id="section-6" class="step">
		<input type="hidden" name="step_name" value="section-6"/>
		<p style="display:true" class="message success">
			SECTION 6 of 7: I. EQUIPMENT AVAILABILITY AND FUNCTIONALITY
		</p>

		<table>
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT.</th>
			

			<tr>
				<th  rowspan="2">Equipment Name</th>

				<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th colspan="2">Available Quantities</th>
			</tr>
			<tr >
		

				<th >Available</th>
				<th>Not Available</th>
				<th>Delivery room</th>
				<th>Pharmacy</th>
				<th>Store</th>
				<th>Other</th>
				<th>Fully-Functional</th>
				<th>Non-Functional</th>
			</tr>
			</thead>
			' . $this -> equipmentsSection . '
			</table>
			<table>
			<thead>
			<tr>
				<th scope="2" rowspan="2">Delivery Equipment Name</th>

				<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th colspan="2">Available Quantities</th>
			</tr>
			<tr >
				<th >Available</th>
				<th>Not Available</th>
				<th>Delivery room</th>
				<th>Pharmacy</th>
				<th>Store</th>
				<th>Other</th>
				<th>Fully-Functional</th>
				<!--td>Partially Functional</td-->
				<th>Non-Functional</th>
			</tr>
			</thead>
			' . $this -> deliveryEquipmentSection . '

		</table>

		<p style="display:true;margin-bottom:50px" class="message success">
			SECTION 6 of 7: II. AVAILABILITY OF WATER
		</p>

		<table>
			<thead>
				<th colspan="10">INDICATE THE AVAILABILITY, LOCATION AND MAIN SOURCE OF THE FOLLOWING.</th>
			
			<tr>
				<th  rowspan="2">Resource Name</th>

				<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
				<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th rowspan="2" > Main Source </th>
				

			</tr>
			<tr >
				<th >Available</th>
				<th>Not Available</th>
				<th>OPD</th>
				<th>MCH</th>
				<th>U5 Clinic</th>
				<th>Maternity</th>
				<th>Other</th>
			</tr>
			</thead>
			' . $this -> suppliesMNHOtherSectionPDF . '
		</table>

		<table >
			<thead>
			<th colspan="12" >INDICATE THE STORAGE AND ACCESS TO WATER BY THE COMMUNITY </th>
				<tr>
			<th  colspan="7">ASPECT</th>
			<th   colspan="5"> RESPONSE </th>			
			<th   colspan="2"> SPECIFY </th>	

		</tr>
		</thead>' . $this -> mnhWaterAspectsSectionPDF . '
		</table>
 <p style="display:true" class="message success">SECTION 6 of 7: III. ELECTRICTY AND HARDWARE RESOURCES</p>
		 <table  class="centre" >
		<thead><tr>
			<th colspan="6">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th></tr>
		
		<tr>
			<th rowspan="2">Resource Name</th>
			
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></th>
			<th rowspan="2">
			
				Main Supplier
			</th>
			<th rowspan="2">			
				Main Source	
			</th>
		</tr>
		<tr >
			<th >Available</th>
			<th>Never Available</th>		
		</tr>
		</thead>' . $this -> hardwareMNHSectionPDF . '
		</table>
	</div><!--\.section-6-->

	<div id="section-7" class="step">
		<input type="hidden" name="step_name" value="section-7"/>
		<p style="display:true" class="message success">
			SECTION 7 of 7: KITS / SETS AVAILABILITY
		</p>

		<table>
			<thead>
				<tr>
					<th colspan="10">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING SUPPLIES.INCLUDE REASON FOR UNAVAILABILITY.</th>
				</tr>
				<tr>
					<th colspan="1" rowspan="2">Supplies Name</th>

					<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="4" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="1" rowspan="2">Available Supplies</th>
					<th colspan="1" rowspan="2"> Main Supplier </th>
					<th colspan="1" rowspan="2">Main Reason For  Unavailability</th>

				</tr>

				<tr>		
					<th >Available</th>
					<th>Not Available</th>
					<th>Delivery room</th>
					<th>Pharmacy</th>
					<th>Store</th>
					<th>Other</th>	
				</tr>
			</thead>
			' . $this -> suppliesSectionPDF . '
		</table>
		<!--p style="margin-top:100px"></p>
		<table>
			<thead>
			
			<th colspan="9"> IN THE LAST 3 MONTHS INDICATE NUMBER OF TIMES THE SUPPLY WAS NOT AVAILABLE.</br>
				WHEN THE SUPPLY WAS NOT AVAILABLE WHAT HAPPENED? </th>

				<tr>
					
					<th colspan="1" rowspan="2">
						Supply Name
					</th>

					<th colspan="2">
						Number Of Times the supply was unavailable</th>
					<th colspan="5">
						When the supply was not available what happened?
						</br>
						<strong>(Multiple Selections Allowed)</strong>
					</th>

				</tr>
				<tr >
					
					<th colspan="2">Times Unavailable </th>

					<th colspan="1">
					
						Patient purchased the supply privately
					</th>
					<th colspan="1">
					
						Facility purchased the supply privately
					</th>
					<th colspan="1">
					
						Facility received the supply from another facility
					</th>
					<th colspan="1">
					
						The procedure was not conducted
					</th>
					<th colspan="1">
					
						The procedure was conducted without the supply
					</th>

				</tr>
			</thead>
			' . $this -> suppliesUsageAndOutageSectionPDF . '
		</table-->
		
		<table >
			<thead>
				<tr>
					<th colspan="12" >PROVISION OF Waste Disposal</th>
				</tr>
				<tr>
					<th style="width:35%">QUESTION</th>
					<th style="width:65%;text-align:left">RESPONSE</th>
				</tr>
			</thead>
			' . $this -> mnhWasteDisposalAspectsSectionPDF . '
		</table>

	</div><!--\.section-7-->
</form>
';
		return $this -> combined_form;
	}

	public function get_mch_form() {
		$this -> combined_form .= ' 

		<p style="display:true" class="message success">
	SECTION 1 of 7: FACILITY INFORMATION
</p>
<table border="2">

	<thead>
		<th colspan="9">FACILITY INFORMATION</th>
	</thead>
	<tbody>
		<tr>
			<td>Facility Name </td><td>
			<input type="text" size="40">
			</td><td>Facility Level </td><td><!--input type="text" id="facilityLevel" name="facilityLevel" class="cloned"  size="40"/-->
			<input type="text" size="40" >
			</td><td>County </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
		<tr>
			<td>Facility Type </td>
			<td>
			<input type="text" size="40" >
			</td>
			<td>Owned By </td>
			<td>
			<input type="text" size="40" >
			</td>

			<td>District/Sub County </td>
			<td>
			<input type="text" size="40" >
			</td>
		</tr>
	</tbody>
</table>
<table>
	<thead>
		<th colspan="3" >FACILITY CONTACT INFORMATION</th>
	</thead>
	<tbody>
		<tr >
			<th scope="col" colspan="2" >CADRE</th>
			<th>NAME</th>
			<th >MOBILE</th>
			<th >EMAIL</th>
		</tr>
		<tr>
			<td  colspan="2">Incharge </td><td>
			<input type="text" id="facilityInchargename" name="facilityInchargename" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityInchargemobile" name="facilityInchargemobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityInchargeemail" name="facilityInchargeemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td  colspan="2">MCH </td><td>
			<input type="text" id="facilityMchname" name="facilityMchname" class="cloned" size="40"/>
			</td><td>
			<input type="text" id="facilityMchmobile" name="facilityMchmobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMchemail" name="facilityMchemail" class="cloned mail" size="40"/>
			</td>
		</tr>
		<tr>
			<td  colspan="2">Maternity </td><td>
			<input type="text" id="facilityMaternityname" name="facilityMaternityname" class="cloned" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternitymobile" name="facilityMaternitymobile" class="phone" size="40"/>
			</td>
			<td>
			<input type="text" id="facilityMaternityemail" name="facilityMaternityemail" class="cloned mail" size="40"/>
			</td>
		</tr>
	</tbody>
</table>
<table class="centre">
	<thead>
		<tr>
			<th colspan="2" >COMMUNITY STRATEGY </th>
		</tr>
	</thead>
	<tr>
		<th  style="width:65%">ASPECT</th>
		<th   style="width:35%;text-align:left"> RESPONSE </th>
	</tr>
	' . $this -> mchCommunityStrategySection . '
</table>
<!--\.the section-1 -->


<div id="section-2" class="step">
	<input type="hidden" name="step_name" value="section-2"/>
	<p style="display:true" class="message success">
		SECTION 2 of 7: GUIDELINES, STAFF TRAINING AND COMMODITY AVAILABILITY
	</p>

	<table class="centre">
		<thead>
			<tr>
				<th colspan="3" >GUIDELINES AVAILABILITY </th>
			</tr>
			<tr>
				<th  style="width:35%">ASPECT</th>
				<th   style="width:10.5%;text-align:left"> RESPONSE </th>
				<th   style="width:52.5%;text-align:left"> If <strong>Yes</strong>, Indicate Total Quantities Available </th>
			</tr>
		</thead>
		' . $this -> mchGuidelineAvailabilitySectionPDF . '
	</table>
	<table class="centre">
		<thead>
			<tr>
				<th colspan="5"  > HOW MANY STAFF MEMBERS HAVE BEEN TRAINED IN THE FOLLOWING?</th>
			</tr>
			<tr>

				<th colspan ="2" style="text-align:left"> TRAININGS</th>
				<th style="text-align:left">Number Trained before 2010</th>
				<th style="text-align:left">Number Trained after 2010</th>
				<th colspan ="2" style="text-align:left">
				<div style="width: 500px" >
					How Many Of The Total Staff Members
					Trained are still Working in Child Health?
				</div></th>
			</tr>
		</thead>
		' . $this -> mchTrainingGuidelineSection . '

	</table>
	<table>
		<thead>
			<tr class="persist-header">
				<th colspan="15">INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES.INCLUDE REASON FOR UNAVAILABILITY. </th>
			</tr>

			<tr>
				<th rowspan="2" >Commodity Name</th>
				<th rowspan="2" >Commodity Unit</th>
				<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
				<th rowspan="2"> Main Reason For  Unavailability </th>
				<th colspan="7" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
				<th rowspan="1" colspan="2" >Available Quantities</th>
				<th rowspan="2" > Main Supplier </th>
				

			</tr>
			<tr>
				<th >Available</th>
				<th>Not Available</th>
				<th>OPD</th>
				<th>MCH</th>
				<th>U5 Clinic</th>
				<th>Ward</th>
				<th>Pharmacy</th>
				<th>Other</th>
				<th>Not Applicable</th>
				<th>No. of Units</th>
				<th>Expiry Date</th>

			</tr>
		</thead>
		' . $this -> mchCommodityAvailabilitySectionPDF . '

	</table>  
	<p style="margin-top:100px"></p>
	<table  class="centre persist-area" >
	<thead>
	    <tr class="persist-header">
		
			<th colspan="15">BUNDLING: INDICATE THE AVAILABILITY, LOCATION, SUPPLIER AND QUANTITIES ON HAND OF THE FOLLOWING COMMODITIES. </th>
		</tr>
		
		<tr>
			<th rowspan="2" >Commodity Name</th>
			<th rowspan="2">Commodity Unit</th>
			<th colspan="2" style="text-align:center"> Availability  
			 <strong></BR>
			(One Selection Allowed) </strong></div>
			</th>
			<th>
			<div style="width: 90%" >
				Main Reason For  Unavailability
			</div>
			</th>
			<th colspan="7" style="text-align:center"> Location of Availability  </BR><strong> (Multiple Selections Allowed)</strong></th>
			<th colspan="1">Available Quantities</th>
			<th colspan="1" rowspan="2">
			
				Main Supplier
			</th>

		</tr>
		<tr >
			
			<th>Available</th>
			<th>Not Available</th>
			<th>Unavailability</th>
			<th>OPD</th>
			<th>MCH</th>
			<th>U5 Clinic</th>
			<th>Ward</th>
			<th>Pharmacy</th>
			<th>Other</th>
			<th>Not Applicable</th>
			<th>No. of Units</th>

		</tr></thead>' . $this -> mchBundlingPDF . '

	</table>
	</div><!--\.section 2-->

	<div id="section-3" class="step">
		<input type="hidden" name="step_name" value="section-3"/>
		<p style="display:true" class="message success">
			SECTION 3 of 7: SERVICE DELIVERY, QUALITY OF DIAGNOSIS
		</p>

		<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD WITH DIARRHOEA?</th>
				</tr>
				<tr>
					<th  style="width:65%">SERVICE</th>
					<th   style="width:35%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this -> mchIndicatorsSectionPDF['svc'] . '
		</table>

		<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
				</tr>
				<tr>
					<th  style="width:65%">SERVICE</th>
					<th   style="width:35%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this -> mchIndicatorsSectionPDF['sgn'] . '
		</table>

		<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >DO HEALTH CARE WORKERS PERFORM THE FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
				</tr>
				<tr>
					<th  style="width:65%">SERVICE</th>
					<th   style="width:35%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this -> mchIndicatorsSectionPDF['dgn'] . '
		</table>

		<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >DO HEALTH CARE WORKERS COUNSEL ON FOLLOWING IN ONGOING SESSION FOR A CHILD WITH DIARRHOEA? </th>
				</tr>
				<tr>
					<th  style="width:65%">SERVICE</th>
					<th   style="width:35%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this -> mchIndicatorsSectionPDF['cns'] . '
		</table>

	</div><!--\.section-3-->
	
	<div id="section-4" class="step">
		<input type="hidden" name="step_name" value="section-4"/>
		<p style="display:true" class="message success">
			SECTION 4 of 7: REVIEW OF RECORDS, DIARRHOEA MORBIDITY DATA
		</p>

		<table class="centre">

			<thead>
				<tr>
					<th colspan="2" > (A) DOES THE UNIT HAVE THE FOLLOWING TOOLS? </th>
				</tr>

				<tr>
					<th  style="width:35%">TOOL</th>
					<th   style="width:65%;text-align:left"> RESPONSE </th>

				</tr>
			</thead>
			' . $this -> mchIndicatorsSectionPDF['ror'] . '
		</table>

		<table class="centre">

			<thead>
				<tr>
					<th colspan="7" > (B) INDICATE THE NUMBER OF DIARRHOEA CASES SEEN IN THIS FACILITY FOR THE FOLLOWING PERIODS </th>
				</tr>
				<tr>
					<th> MONTH</th><th>
					<div style="width: 50px">
						JANUARY
					</div></th><th>FEBRUARY</th><th>MARCH</th><th> APRIL</th><th> MAY</th><th>JUNE</th>
				</tr>
			</thead>
			<tr>
				<th>2013</th>
				<td style ="text-align:center;">
				<input type="text" id="dnjanuary_13" size="8" name="dnjanuary_13" class="cloned numbers"/>
				</td>

				<td style ="text-align:center;">
				<input type="text" id="dnfebruary_13" name="dnfebruary_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnmarch_13" name="dnmarch_13" size="8"class="cloned numbers"/>
				</td>
				<td style ="text-align:center;background:red">
				<input type="text" id="dnapril_13" name="dnapril_13" size="8"class="cloned numbers not-read"/>
				</td>
				<td style ="text-align:center;background:red">
				<input type="text" id="dnmay_13" name="dnmay_13" size="8"class="cloned numbers not-read" />
				</td>
				<td style ="text-align:center;background:red">
				<input type="text" id="dnjune_13" name="dnjune_13" size="8"class="cloned numbers not-read" disabled/>
				</td>

			</tr>
			<tr>
				<th> MONTH</th><th> JULY</th><th> AUGUST</th><th> SEPTEMBER</th><th> OCTOBER</th><th> NOVEMBER</th><th> DECEMBER</th>
			</tr>
			<tr>
				<th>' . 2013 . '</th>
				<td style ="text-align:center;background:red">
				<input type="text" id="dnjuly_13" size="8" name="dnjuly_13" class="cloned numbers not-read" />
				<td style ="text-align:center;background:red">
				<input type="text" id="dnaugust_13" size="8" name="dnaugust_13" class="cloned numbers not-read" disabled/>
				</td>
				<td  style ="text-align:center;background:red">
				<input type="text" id="dnseptember_13" size="8" name="dnseptember_13" class="cloned numbers not-read" disabled/>
				</td>
				<td style ="text-align:center;">
				<input type="text" id="dnoctober_13" size="8" name="dnoctober_13" class="cloned numbers" disabled/>
				</td>
				<td style ="text-align:center;" widtd="15">
				<input type="text" id="dnnovember_13" size="8" name="dnnovember_13" class="cloned numbers" disabled/>
				</td>

				<td style ="text-align:center;">
				<input type="text" id="dndecember_13" size="8" name="dndecember_13" class="cloned numbers" disabled/>
				</td>
			</tr>
		</table>

		<table class="centre">

			<thead>
			<tr>
				<th colspan="6" > (C) HOW MANY CHILDREN WERE GIVEN THE FOLLOWING TREATMENT BASED ON THE CLASSIFICATION BELOW IN THE LAST 3 MONTHS? </th>
			</tr>
				<tr>

					<th  rowspan="2" style="width:35%">TREATMENT</th>
					<th colspan="5" style="text-align:center"> Classification</th>

				</tr>
				<tr >

					<th >Severe Dehydration</th>
					<th>Some Dehydration</th>
					<th>No Dehydration</th>
					<th>Dysentry</th>
					<th>No Classification</th>
				</tr>
			</thead>
			' . $this -> treatmentMCHSection . '
		</table>

		<table class="centre">
		
		<thead>
		<tr>
			<th colspan="6" > (D) WHAT IS THE MAIN CHALLENGE IN ACCESSING <span style="text-decoration:underline">DATA TREATMENT RECORDS</span> FOR DIARRHOEA CASES IN CHILDREN U5 IN THE LAST 3 MONTHS
			(refer to Question C above)(One Selection Allowed) </th></tr>
		</thead>
		'.$this -> selectAccessChallenges.'
		
		
	</table>

	</div><!--\.section-4-->
	
	<div id="section-5" class="step">
		<input type="hidden" name="step_name" value="section-5"/>
		<p style="display:true" class="message success">
			SECTION 5 of 7: ORT CORNER ASSESSMENT,EQUIPMENT AVAILABILITY AND STATUS
		</p>

		<table class="centre">
			<thead>
				<tr>
					<th colspan="2" >0RAL REHYDRATION THERAPY CORNER ASSESSMENT </th>
				</tr>
				<tr>
					<th  style="width:35%">ASPECT</th>
					<th   style="width:65%;text-align:left"> RESPONSE </th>
				</tr>
			</thead>
			' . $this -> ortCornerAspectsSectionPDF . '
		</table>

		<table  class="centre" >
			<thead>
				<tr>
					<th colspan="10">INDICATE THE AVAILABILITY, LOCATION  AND FUNCTIONALITY OF THE FOLLOWING EQUIPMENT AT THE ORT CORNER.</th>
				</tr>
				<tr>
					<th colspan="1" rowspan="2">Equipment Name</th>
					<th colspan="2" style="text-align:center">Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="2">Available Quantities</th>
				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
					<th>Fully-Functional</th>
					<th>Non-Functional</th>
				</tr>
			</thead>
			' . $this -> equipmentsMCHSection . '

		</table>
		<div id="section-6" class="step">
		<input type="hidden" name="step_name" value="section-6"/>
		<p style="display:true" class="message success">
			SECTION 6 of 7: SUPPLIES AVAILABILITY
		</p>
		<table  class="centre" >
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>

				<tr>
					<th colspan="1" rowspan="2">Supplies Name</th>

					<th colspan="2" style="text-align:center"> Availability <strong></BR> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </BR><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="1" rowspan="2"> Main Supplier </th>

				</tr>
				<tr >
					<th >Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this -> suppliesMCHSectionPDF . '
		</table>
		<p style="display:true;margin-top:150px" class="message success">
			SECTION 7 of 7: ELECTRICTY AND HARDWARE RESOURCES
		</p>
		<table  class="centre" >
			<thead>
				<th colspan="9">INDICATE THE AVAILABILITY, LOCATION AND SUPPLIER OF THE FOLLOWING.</th>

				<tr>
					<th colspan="1" rowspan="2">Resource Name</th>
					<th colspan="2" style="text-align:center"> Availability <strong></br> (One Selection Allowed) </strong></th>
					<th colspan="5" style="text-align:center"> Location of Availability </br><strong> (Multiple Selections Allowed)</strong></th>
					<th colspan="1" rowspan="2"> Main Supplier </th>

				</tr>
				<tr >
					<th>Available</th>
					<th>Not Available</th>
					<th>OPD</th>
					<th>MCH</th>
					<th>U5 Clinic</th>
					<th>Ward</th>
					<th>Other</th>
				</tr>
			</thead>
			' . $this -> hardwareMCHSectionPDF . '
		</table>
		

	</div><!--\.section-6 & 7-->
	</div><!--\.section-5-->
				';

		return $this -> combined_form;
	}
	public function get_hcw_form(){
		$filename = 'Mentorship Form';
		$this -> combined_form='<table>
	<thead>
	<tr>
			<th colspan="2" style="font-size:22px">Follow up Support supervision checklist on IMCI after training </th>
		</tr>
		<tr>
			<th colspan="2" >Facility Information</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><label for="">Name of the health centre/facility</label><input type="text"></td>
			<td><label for="">Date of supervision</label><input type="text"></td>
		</tr>
		<tr>
			<td><label for="">Facility type</label><input type="text"></td>
			<td><label for="">Name of Supervisor</label><input type="text"></td>
		</tr>
		<tr>
			<td><label for="">Level of Care</label><input type="text"></td>
			<td><label for="">MFL Code</label><input type="text"></td>
		</tr>
		<tr>
			<td><label for="">Municipality/Ward</label><input type="text"></td>
			<td><label for="">Designation</label><input type="text"></td>
		</tr>
		<tr>
			<td><label for="">Sub County</label><input type="text"></td>
			<td><label for="">County</label><input type="text"></td>
		</tr>

	</tbody>
	<tfoot></tfoot>
</table>
<table>
	<thead>
	<tr>
		<th colspan="2">HCW Profile </th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<td colspan="2">Name of Provider</td>
	</tr>
	<tr>
		<td>First Name<input type="text"></td>
		<td>Surname<input type="text"></td>
		
	</tr>
	<tr>
		<td>National ID<input type="text"></td>
		<td>Phone Number<input type="text"></td>
	</tr>
	<tr>
		<td>Year, Month when trained <input type="text"></td>
		<td><p><b>Key coordinator of the training(Select one)</b></p>
		<p><input type="radio">MOH/KPA/CHAI</p>
		<p><input type="radio">MOH only</p>
		<p><input type="radio">Other</p>
		<p>(If other, indicate the name of the coordinator/partner)<input type="text"></p>
		</td>
	</tr>
	<tr>
		<td><label for="">Designation</label></td>
		<td><input style="width:100px" type="text"></td>
	</tr>
	</tbody>
	<tfoot></tfoot>
</table>
<p class="message success">Work Station Profile</p>
<table>

	<tbody>
	<tr>
		<td>Current Unit</td>
		<td><input type="text"></td>
	</tr>

	</tbody>
	
</table>
<table>
	<thead>
	<tr>
			<th>Question</th>
			<th>Yes</th>
			<th>No</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>
				1.	Is the HCW still working in the original facility they were when they got trained? 
			</td>
			<td>
				<input type="radio">
			</td>
			<td>
				<input type="radio">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				If No to question 1 indicate whether the HCW: 
			</td>
		</tr>		
		<tr>
			<td>
				Transferred to another facility in the same county
			</td>
			<td>
				<input type="radio">
			</td>
			<td>
				<input type="radio">
			</td>
		</tr>
		<tr>
			<td colspan="3">If Yes, indicate name of the facility <input type="text"> </td>
		</tr>
		<tr>
			<td>
				Transferred to another facility in another county
			</td>
			<td>
				<input type="radio">
			</td>
			<td>
				<input type="radio">
			</td>
		</tr>
		<tr>
			<td colspan="3">If  Yes, indicate the name of the county <input type="text"> and facility <input type="text"> </td>
		</tr>
		</tbody>
</table>
<p class="message success">OBSERVATION OF CASE MANAGEMENT: ONE CASE PER HCW</p>
<table class="centre">
    <thead>
        <tr>
            <th colspan="2" >ARE THE FOLLOWING SERVICES OFFERED TO A CHILD</th>
        </tr>
        <tr>
            <th  style="width:65%">SERVICE</th>
            <th   style="width:35%;text-align:left"> RESPONSE </th>
        </tr>
    </thead>
    ' . $this -> mchIndicatorsSectionPDF['svc'] . '
</table>
<table class="centre">
    <thead>
        <tr>
            <th colspan="2" >ARE THE FOLLOWING DANGER SIGNS ASSESSED IN ONGOING SESSION FOR A CHILD</th>
        </tr>
        <tr>
            <th  style="width:65%">SERVICE</th>
            <th   style="width:35%;text-align:left"> RESPONSE </th>
        </tr>
    </thead>
    ' . $this -> mchIndicatorsSectionPDF['sgn'] . '
</table>
<p class="message success">ASSESSMENT FOR THE 4 MAIN SYMPTOMS IN AN ONGOING SESSION FOR A CHILD</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>1. Cough / Pneumonia</th>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>2. Diarrhoea</th>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">Symptom</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>3. Fever / Malaria</th>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
</table>
<p class="message success">DOES THE HCW CHECK FOR THE FOLLOWING</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px" rowspan="2">Condition</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px" rowspan="2">Classification</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>6) Correct Classification(s)</td>
        </tr>
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px" rowspan="2">Treatment and Counselling</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>7) ORT given appropriately according to plan</td>
        </tr>
        <tr>
            <td>8) Children with diarrhoea treated with Zinc</td>
        </tr>
        <tr>
            <td>9) Antibiotic prescribed correctly</td>
        </tr>
        <tr>
            <td>10) No antibiotic needed; none given</td>
        </tr>
        <tr>
            <td>11) Anti-malarial prescribed correctly</td>
        </tr>
        <tr>
            <td>12) Needed Vitamin A supplementation given</td>
        </tr>
        <tr>
            <td>13) Needed de-worming medication given</td>
        </tr>
        <tr>
            <td>14) Appropriate counseling in feeding problems given </td>
        </tr>
        <tr>
            <td>15) Appropriate follow up arranged</td>
        </tr>
    </tbody>
</table>
<table class="centre">
    <thead>
        <tr>
            <th width="700px" rowspan="2">Referrals</th>
            <th colspan="2">Response</th>
        </tr>
        <tr>
            <th>Yes</th>
            <th>No</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>16) Necessary referral made, including referral note and pre-treatment</td>
        </tr>
    </tbody>
</table>
<table>
	<thead>
	<tr>
		<th></th>
		<th></th>
		<th colspan="2">Case 1</th>
		<th colspan="2">Case 2</th>
		<th colspan="2">Case 3</th>
	</tr>
	<tr>
		<th></th>
		<th></th>
		<th>Yes</th>
		<th>No</th>
		<th>Yes</th>
		<th>No</th>
		<th>Yes</th>
		<th>No</th>
	</tr>

	</thead>
	<tbody>
	<tr>
		<th colspan="8">3.1 Consultation observation (observe three patient consultations if possible): write N/A if not applicable </th>
	</tr>
	<tr>
		<td rowspan="4">3.1.1</td>
		<td colspan="7">Did provider follow IMCI protocol during</td>
		
		
	</tr>
	<tr>
		<td>Assessment( General danger signs and other signs)</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>  Classification</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>Treatment  </td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.2</td>
		<td>Did provider use IMCI case recording form/register?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.3</td>
		<td>Did she do rapid test for malaria/ microscopy correctly? (Applicable only if the child with fever)</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.4</td>
		<td>Did she do tourniquet for Dengue correctly? (Applicable only if the child with fever less than 7 days)</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.5</td>
		<td>Did provider inform caregiver about illness of her child?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.6</td>
		<td>Did provider instruct caregiver how to give medicine to child?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.7</td>
		<td>Did provider give first dose of medicine at health centre?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.8</td>
		<td>Did provider counsel about child’s feeding?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.9</td>
		<td>Did provider explain how to take care of child?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.10</td>
		<td>Did provider ask caregiver for feedback</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.11</td>
		<td>Did he/she explain when to return?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.1.12</td>
		<td>Did he/she use mother’s card?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.13</td>
		<td>Duration of consultation (minutes)?</td>
		<td colspan="7"><input type="number"></td>
	</tr>
	<tr>
		<th colspan="8">3.2 Interview with the caregiver/mother</th>
	</tr>
	<tr>
		<td>3.2.1</td>
		<td>Was mother/caregiver satisfied?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.2.2</td>
		<td>Who advices mother/caregiver to seek care from this centre?</td>
		<td colspan="6"><input type="text"></td>
	</tr>
	<tr>
		<td>3.2.3</td>
		<td>Did mother/caregiver explain correctly how to give medicine?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.2.4</td>
		<td>Did he/she explain correctly how to take care of child at home?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
	<tr>
		<td>3.2.5</td>
		<td>Did he/she explain when to return to health centre immediately?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>
		<tr>
		<td>3.2.6</td>
		<td>Did s/he explain when to return to health centre for follow-up?</td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
		<td><input type="radio"></td>
	</tr>

	</tbody>
	<tfoot></tfoot>
</table>
<!--table>
	<thead>
	<tr colspan="3">
		1. Health services organization  
	</tr>
	<tr>
		<th>1.1 Has IMCI corner/room been established? </th>
		<th>Yes</th>
		<th>No</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td><label for="">1.1.1 Is there any available seating area for mother and child?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.1.2 Enough space to see patient?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.1.3 Chair and Table for health worker?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.1.4 Chair/seat for caregiver?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.1.5 Updated wall chart on the wall?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.1.6 Waiting space for mother/caregiver and children?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>

	</tbody>
	<tfoot></tfoot>
</table>
<table>
	<tr>
			<th colspan="2">If any problem is found related to IMCI corner, what actions are needed to be taken? Develop and ensure</th>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table>
<table>
	<thead>
	<tr>
		<th>1.2 Oral rehydration therapy (ORT) corner? </th>
		<th>Yes</th>
		<th>No</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<td><label for="">1.2.1 Adequate space for giving ORT?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.2.2 Table (for mixing ORS solution and demonstrations), chairs for caretakers?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.2.3 Supplies (cup, spoon, measuring /mixing utensils)?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.2.4 Source of safe drinking water?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td><label for="">1.2.5 Functioning ORT: Children with some dehydration receive ORS solution at facility?</label></td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		
	</tbody>
	
</table>
<p style="margin-top:50px"></p>
<table>
	<tr>
			<th colspan="2">If any problem is found related to ORT corner, what actions are needed to be taken? Develop and ensure</th>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table>
<table>
	<thead>
	<tr>
		<th colspan="7">2.	Clinical staff trained on IMCI </th>
	</tr>
	<tr>
		<th>Clinical Staff</th>
		<th>Total post (BSP wise)</th>
		<th>Available staff against post</th>
		<th>Number of Clinical Staff trained in IMCI</th>
		<th>% of available clinical staff trained in IMCI</th>
		<th>% of staff who received refresher training on Updated Module</th>
		<th>Number of Clinical Staff supported by follow-up after Training</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><label for="">Doctor</label></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
	</tr>
	<tr>
		<td><label for="">Nurse</label></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
	</tr>
	<tr>
		<td><label for="">R.C.O</label></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
		<td><input style="width:100px" type="text"></td>
	</tr>

	</tbody>
	<tfoot></tfoot>
</table>
<table>
	<tr>
			<th colspan="2">If any problem related to IMCI training and staff is found, discuss with respective officer-in-charge of health
centre and make a plan. Develop and ensure support plan also. </th>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table-->
<p style="margin-top:100px" class="message success">PROVIDER SCORE</p>
<table class="centre">
    <thead>
        <tr>
            <th width="700px">GIVE ONE POINT FOR EACH ANSWER</th>
            <th >Response</th>
        </tr>
    </thead>
    <tbody>
    <tr>
    	<td>ASSESSMENT</td>
    	<td><input type="text"></td>
    </tr>
    <tr>
    	<td>CLASSIFICATION</td>
    	<td><input type="text"></td>
    </tr>
    <tr>
    	<td>TREATMENT</td>
    	<td><input type="text"></td>
    </tr>
    <tr>
    	<td>COUNSELING</td>
    	<td><input type="text"></td>
    </tr>
    <tr>
    	<td>RETURNIN DATE FOR FOLLOW-UP</td>
    	<td><input type="text"></td>
    </tr>
    <tr>
    	<td>TOTAL</td>
    	<td><input type="text"></td>
    </tr>
    </tbody>
</table>


<!--table>
	<tr>
			<td colspan="2" class="bordered">
				Scoring of skills of provider: give 1 point for each YES answer (please discard 3.1.13 and 3.2.2). If the child has
malaria (3.1.3) or Dengue ( 3.1.4) then total score will be 54, otherwise it will be 48, however, it depends on total
observational session). Do not count N/A as point.

<p> Score:                  ----------X 100= .........%</p>

			 </td>
		</tr>
			<tr>
			<td colspan="2" class="bordered">
				Share your findings from observational sessions with provider.  Praise for the things done well and discuss on 
the identified weakness, show how it could be done. Ask provider, does s/he have any problem regarding
assessment, classification, treatment, counselling, follow-up etc. If s/he has, try to solve the problem instantly.
Note down the decisions which have been taken to improve the skills and continue the practices:

			 </td>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table>
<table>
	<thead>
	<tr>
		<th colspan="7">4. Qualty of records (Document review) </th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td><label for="">4.1 Did they send monthly report of last month</label></td>
		<td>Yes<input type="radio"></td>
		<td>No<input type="radio"></td>
	</tr>
	<tr>
		<td><label for="">4.2 Ask to show report and look for following data</label></td>
		<td>Yes<input type="text"></td>
		<td>No<input type="text"></td>
	</tr>
	<tr>
		<td rowspan="2"><label for="">4.3 Total IMCI patients in last month</label></td>
		<td>Male<input type="text"></td>
		<td>Female<input type="text"></td>
		<td>Total<input type="text"></td>
	</tr>
	<tr>
		<td>First Visit<input type="text"></td>
		<td>Follow-Up<input type="text"></td>
		<td>Caseload<input type="text">/provider/day</td>
	</tr>
	<tr>
		<td><label for="">4.4 Individual patient record or register maintained? </label></td>
		<td>Yes<input type="radio"></td>
		<td>No<input type="radio"></td>
	</tr>
	<tr>
		<td colspan="3"><label for="">4.5 Ask to show report and look for following data</label></td>
	</tr>
	</tbody>
	<tfoot></tfoot>
</table>
<table>
	<thead>
		<tr>
			<th width="300">Indicators  2 mo – 5 yr</th>
			<th colspan="7">Assess the register book ( tick mark when it
is correct  and cross when it is wrong, write
N/A when it is not applicable and make % of
correct )
</th>
		</tr>
		<tr>
			<th>Assessment</th>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
			<th>Sum Yes</th>
			<th>%</th>
		</tr>
		<tbody>
			<tr>
				<td>1) Weight and Temperature correctly charted  </td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
			</tr>
			<tr>
				<td>2) General Danger Signs</td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
			</tr>
			<tr>
				<td>3) Feeding assessment if under two yrs, anemia or very low weight</td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
			</tr>
			<tr>
				<td>4) Rapid Test for malaria  </td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
			</tr>
			<tr>
				<td>5) Microscopy for malaria according to IMCI protocol</td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
				<td><input style="width:100px" type="text"></td>
			</tr>
			
		</tbody>
		<tfoot></tfoot>
	</thead>
</table>
<table>
	<tr>
			<th colspan="2">Ask them, what problems do they encounter in filling up the IMCI register, HMIS? And try to solve the problems. </th>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table>
<table>
	<thead>
		<th>5. Infection control at IMCI corner/room</th>
		<th>Yes</th>
		<th>No</th>
	</thead>
	<tbody>
		<tr>
			<td>5.1 Do they use disposable syringes during IM/IV injection?</td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td>5.2 Safety precaution to give injection (using gloves, cleaning surface with alcohol and discarding syringes after use)?</td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td>5.3 Source of water for hand wash?  </td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td>5.4 Soap and/or disinfectant (like chlorhexidine or alcohol) for washing hand?</td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
		<tr>
			<td>5.5 Safe disposal box with cover?</td>
			<td><input type="radio"></td>
			<td><input type="radio"></td>
		</tr>
	</tbody>
	<tfoot>
		
	</tfoot>
</table>
<table>
	<tr>
			<th colspan="2">If any problems related to the IMCI corner are found, what actions are needed to be taken? Develop and ensure
support plan also.
 </th>
		</tr>
		<tr>
			<td><label for="">Action/s to be taken by supervisor:</label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> Action/s to be taken by supervisee:</label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
</table-->
<!--table>
	<thead>
		<tr>
			<th colspan="5">6. Job aid and supplies ( make a tick mark when correct)  and write N/A where not feasible</th>
		</tr>
		<tr>
			<th>Logistics</th>
			<th>Available</th>
			<th>Adequate enough in stock for one month</th>
			<th>Functioning</th>
			<th>Remark</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>IMCI case recording form</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Mother’s card </td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Referral slip</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Chart booklet </td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>ARI timer(functioning)</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Thermometer</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>MUAC Tape</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Weight machine</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Nebuliser Machine</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Spacer</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Microscope for malaria test</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>RDT strips and reagent for malaria</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Ambubag</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>BP Cuff for Tourniquet test </td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>IMCI reporting format (HMIS)</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Suction Machine</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>NG tube</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Cup, Spoons for ORT</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Disposable Syringes</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Insulin Syringes</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Absorbent clean cloth/ soft but strong tissue for ear wicking</td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<th colspan="5">Medicine</th>
		</tr>
		<tr>
			<td>ORS packet</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Capsule Vitamin A ( 100000 i.u.)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Capsule Vitamin A ( 200000 i.u.)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Amoxicillin</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Amoxicillin</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab.Paed Cotrimoxazole (120mg) </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Cotrimoxazole (480mg)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Cotrimoxazole  </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Ciprofloxacin (100mg) </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Ciprofloxacin (250mg) </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Erythromicyn</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Erythromicyn</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Inj. Cholarmphenicol</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Coartem (140mg)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Quinine (300mg)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Inj. Quinine ( 150mg/2ml)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Inj. Quinine( 300mg/2ml )</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Inj Diazepam ( 10 mg/2ml )</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab.Zinc</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Iron – folic acid </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Iron</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab/Cap. Multivitamin</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Albendazole</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Cholramphenicol eye ointment</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tetracycline eye ointment </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Paracetamol 500mg</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Tab. Paracetamol 100mg</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Paracetamol  </td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Syrp. Salbutamol</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Inhaler Salbutamol</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>Gention Violet (0.25%)</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>10% Dextrose</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>IV fluid: Ringer lactate Solution</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>
		<tr>
			<td>IV fluid: 9% Normal Saline</td>
			<td><input style="width:100px" type="text"></td>
			<td><input style="width:100px" type="text"></td>
			<td class="shaded"></td>
			<td><input style="width:100px" type="text"></td>
		</tr>

	</tbody>
	<tfoot></tfoot>
</table>
<p style="margin-top:150px"></p>
<table>
	<tr>
			<th colspan="2">If you found any gaps regarding drugs and logistics, discuss and make an activity and support plan to address
the problems.
 </th>
		</tr>
		<tr class="bordered">
			<td><label for=""><b>Action/s to be taken by supervisor:</b></label> </br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
			<td><label for=""> <b>Action/s to be taken by supervisee:</b></label></br>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>

		<tr>
			<th colspan="2">Supervision:</th>
		</tr>
		<tr>
			<td><label for="">Did anybody visit this centre for IMCI supervision in
last three months (quarter)?
</label></td>
			<td>
				Yes<input type="radio">No<input type="radio">
			</td>
		</tr>
		<tr>
			<td><label for="">Ask them to give you the last supervision report?</label></td>
			<td>
				Date<input type="date">
				Supervisor Designation<input type="text">
			</td>
		</tr>
		<tr>
			<td><label for="">Progress of the last decision/s which was/were taken during last visit?</label></td>
			<td>
				<textarea style="height:50px;width:500px"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				Signature of Supervisee:<input type="text">
Date:<input type="text">


			</td>
			<td>
				Signature of Supervisor:<input type="text">
Date:<input type="text">
</td>
		</tr-->
<p class="message success">ASSESSMENT OUTCOME</p>
<table>

<tr>
<td colspan="2">
	<p><input type="radio">Fully Practicing IMCI</p>
<p><input type="radio">	Partially practicing IMCI (capture reasons) </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Has some knowledge gaps (specify the gaps)<input type="text"></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Others (specify)<input type="text"></p>
<p><input type="radio">	Not practicing IMCI (capture reasons) </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Could not be traced</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Transferred to another county</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Transferred to a non-pardiatric unit</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio">	Other (specify)<input type="text"></p>
<p>Certificatied:<input type="radio">YES <input type="radio">NO</p>
</td>
	

</tr>

</table>
<p style="margin-top:50px"></p>
<table style="border:2px solid #666">
<tr>
		<td><i>Please leave a copy of signed report to respective facility before leaving and send one copy to district within 7 days of visit </i></td>
		</tr>
</table>

';
return $this -> combined_form;
	}

	public function loadPDF($survey) {
		$stylesheet = ('<style>
		input[type="text"]{
			width:600px;
		}
		input[type="number"]{
			width:400px;
		}
		table{
			width:1000px;
		}
		.break { page-break-before: always; }
		.success {
background: #cbc9c9;
color: #000;
border-color: #FFFFEE;
font: bold 100% sans-serif;}
		td{
			background:#d5eaf0;
		}
		th {
text-align: left;
background: #91c5d4;
}
.not-read{
	background:#aaa;
}
		</style>
		');

		//$html = $this -> get_mnh_form();
		//echo $html;die;
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');

		switch($survey) {
			case 'mnh' :
				$html = $this -> get_mnh_form();
				$this -> mpdf -> SetTitle('MNH Assessment Tool');
				$this -> mpdf -> SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">MNH Assessment Tool:</em> October 2013 - March 2014 (mid-term)</p>');
				$this -> mpdf -> SetHTMLFooter('<em>MNH Assessment Tool</em> <p style="display:inline-block;vertical-align:top;font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');
				$report_name = 'MNH Assessment Tool' . ".pdf";
				//echo $html;die;
				break;
			case 'mch' :
				$html = $this -> get_mch_form();
				$this -> mpdf -> SetTitle('CH Assessment Tool');
				$this -> mpdf -> SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">CH Assessment Tool:</em> October 2013 - March 2014 (mid-term)</p>');
				$this -> mpdf -> SetHTMLFooter('<em>CH Assessment Tool</em> <p style="font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');

				$report_name = 'CH Assessment Tool' . ".pdf";
				//echo $html;die;
				break;
			case 'hcw' :
				$html = $this -> get_hcw_form();
				$this -> mpdf -> SetTitle('Follow-Up Tool after IMCI Training');
				$this -> mpdf -> SetHTMLHeader('<p style="border-bottom:2px solid #000;font-size:15px;margin-bottom:40px"><em style="font-weight:bold;padding-right:10px">Follow-Up Tool after IMCI Training:</em> October 2013 - March 2014 (mid-term)</p>');
				$this -> mpdf -> SetHTMLFooter('<em>Follow-Up Tool after IMCI Training</em> <p style="font-size:14px;font-weight:bold;margin-left:900px">{PAGENO} of {nb}<p>');

				$report_name = 'Follow-Up Tool after IMCI Training' . ".pdf";
				//echo $html;die;
				break;
		}
		//$this -> mpdf -> setFooter('{PAGENO} of {nb}');
		$this -> mpdf -> simpleTables = true;
		//$this -> mpdf -> WriteHTML($stylesheet, 1);
		$this -> mpdf -> WriteHTML($stylesheet . $html);

		$this -> mpdf -> Output($report_name, 'I');

	}

}
