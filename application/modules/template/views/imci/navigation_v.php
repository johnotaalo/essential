<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php echo anchor('home', $this->nav_brand, array('class'=>'navbar-brand')); ?>
		</div>
		<div class="navbar-collapse collapse navbar-inverse-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><?php echo anchor('home', '<i class="fa fa-home fa-lg"></i>'); ?></li>

				<?php
				if($this->uri->segment(1) === 'manage')
				{
					?>
					<li><?php echo anchor('manage/users/admins/view', '<i class="fa fa-users fa-lg"></i>', array('title'=>'System Administrators')); ?></li>
					<li><?php echo anchor('manage/users/trainees/view', '<i class="fa fa-mortar-board fa-lg"></i>', array('title'=>'Trainees')); ?></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-play"></i> &nbsp; Media <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo anchor('manage/media/pictures/view', 'Pictures'); ?></li>
							<li><?php echo anchor('manage/media/videos/view', 'Videos'); ?></li>
						</ul>
					</li>
					<li><?php echo anchor('manage/exams/view', '<i class="fa fa-pencil fa-lg"></i>', array('title'=>'Tests & Exams')); ?></li>
					<li><?php echo anchor('manage/users/perfomance/view', '<i class="fa fa-trophy fa-lg"></i>', array('title'=>'Trainee Perfomance')); ?></li>
					<?php
				}
				else
				{
					?>
					<li><?php echo anchor('learn', '<i class="fa fa-book fa-lg"></i>', array('title'=>'Learning Center')); ?></li>
					<li><?php echo anchor('test', '<i class="fa fa-mortar-board fa-lg"></i>', array('title'=>'Exam Center')); ?></li>
					<?php
				}
				?>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> &nbsp; Account <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo anchor('account/create', 'Create Account'); ?></li>
						<li><?php echo anchor('account/access', 'Login'); ?></li>
						
						<li class="divider"></li>

						<li><?php echo anchor('account/profile', 'Profile'); ?></li>
						<li><?php echo anchor('account/edit/1', 'Edit'); ?></li>
						<li class="divider"></li>
						<li><?php echo anchor('account/logout', 'Sign Out'); ?></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>