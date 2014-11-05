<div class="col-md-4">
	<p class="lead">My Profile</p>
	
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<?php
					$avatar = array(
						'src' => 'assets/images/imci/users/no_avatar.jpg',
						'width' => '300',
						'class' => 'img-responsive',
					);
					echo img($avatar);
					?>
				</div>
				<div class="col-md-8">
					<table class="table table-responsive table-condensed">
						<tr>
							<td class="text-right" width="30%">Gender</td>
							<td class="text-left" width="70%"><b>Male</b></td>
						</tr>
						<tr>
							<td class="text-right">Birthday</td>
							<td class="text-left"><b>23rd September</b></td>
						</tr>
						<tr>
							<td class="text-right">From</td>
							<td class="text-left"><b>Roysambu</b></td>
						</tr>
						<tr>
							<td class="text-right">Last Login</td>
							<td class="text-left"><b>3 hours ago</b></td>
						</tr>
					</table>
				</div>
			</div>

			<table class="table table-responsive table-condensed">
				<caption><b>Professional Details</b></caption>
				<tr>
					<td class="text-right" width="30%">Role</td>
					<td class="text-left" width="70%"><b>Doctor</b></td>
				</tr>
				<tr>
					<td class="text-right">Facility</td>
					<td class="text-left"><b>Some Facility</b></td>
				</tr>
				<tr>
					<td class="text-right">Employer Type</td>
					<td class="text-left"><b>Government</b></td>
				</tr>
				<tr>
					<td class="text-right">Professional No.</td>
					<td class="text-left"><b>123456789</b></td>
				</tr>
				<tr>
					<td class="text-right">Personnel No.</td>
					<td class="text-left"><b>123456789</b></td>
				</tr>
			</table>

			<hr>
			<p class="text-right"><small>Created on <b>Sept 25th 2014</b></small></p>
		</div>

	</div>
</div>

<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-body">
			<p>Activity Track</p>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php
					$perfomance = array(
						'src' => 'assets/images/imci/graphs/activity_track.jpg',
						'width' => '1000',
						'class' => 'img-responsive',
					);
					echo img($perfomance);
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<p>Current Course Progress</p>
					<?php
					$perfomance = array(
						'src' => 'assets/images/imci/graphs/perfomance.jpg',
						'width' => '300',
						'class' => 'img-responsive',
					);
					echo img($perfomance);
					?>
				</div>
				<div class="col-md-4">
					<p>Total Progress</p>
					<?php
					$perfomance = array(
						'src' => 'assets/images/imci/graphs/perfomance.jpg',
						'width' => '300',
						'class' => 'img-responsive',
					);
					echo img($perfomance);
					?>
				</div>
				<div class="col-md-4">
					<p>Perfomance</p>
					<?php
					$perfomance = array(
						'src' => 'assets/images/imci/graphs/perfomance.jpg',
						'width' => '300',
						'class' => 'img-responsive',
					);
					echo img($perfomance);
					?>
				</div>
			</div>
		</div>
	</div>
</div>