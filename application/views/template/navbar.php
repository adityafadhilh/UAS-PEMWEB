<?php defined('BASEPATH') or exit('No direct script access allowed !'); ?>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"> Toggle Navigation </span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand color-blue">Facilities Booking</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php if($this->session->userdata('role') == 'Admin') {?>
				<li>
					<a href="<?php echo base_url("index.php/Home/userList"); ?>">Users</a>
				</li>
				<?php } ?>
				<li>
					<a href="<?php echo base_url("index.php/Home/facilityList"); ?>">Facilities</a>
				</li>
				<li>
					<a href="<?php echo base_url("index.php/Home/requestList"); ?>">Requests</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href=""><?php echo $this->session->userdata('nama') ?></a>
				</li>
				<li>
					<a href="<?php echo base_url('index.php/Home/logout'); ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>