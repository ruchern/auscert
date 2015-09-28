<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AusCert | Login &amp; Register</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.min.css'); ?>" />


	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-select.min.js'); ?>"></script>


</head>

<body>
<div id="formModal">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
		<li><a href="#register" data-toggle="tab">Register</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active in" id="login">
			<?php
			$attributes = array(
				'id' => 'formLogin',
				'name' => 'formLogin',
				'class' => 'formLogin'
			);
			echo form_open('login/validateLogin', $attributes);
			?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				<input type="text" id="loginUsername" name="loginUsername" placeholder="Username" class="form-control text-input">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				<input type="password" id="loginPassword" name="loginPassword" placeholder="Password" class="form-control text-input">
			</div>

			<div class="form-group">
				<button class="btn-UQ">Login</button>
			</div>
			</form>
		</div>

		<div class="tab-pane fade" id="register">
			<?php
			$attributes = array(
				'id' => 'formRegister',
				'name' => 'formRegister',
				'class' => 'formRegister'
			);
			echo form_open('register/registerUsers', $attributes);
			?>
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				<input type="text" id="registerUsername" name="registerUsername" placeholder="Username" class="form-control text-input" value="<?php echo set_value('registerUsername'); ?>">
			</div>
			<span class="errorMessage"><?php echo form_error('registerUsername'); ?></span>

			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				<input type="password" id="registerPassword" name="registerPassword" placeholder="Password" class="form-control text-input">
			</div>
			<span class="errorMessage"><?php echo form_error('registerPassword'); ?></span>

			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
				<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" placeholder="Confirm Password" class="form-control text-input">
			</div>
			<span class="errorMessage"><?php echo form_error('registerRepeatPassword'); ?></span>

			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-group fa-fw"></i></span>
				<select class="selectpicker form-control text-input" multiple data-max-options="4" data-live-search="true" data-selected-text-format="count>2" title="Select Faculty" id="registerGroup" name="registerGroup[]">
					<?php
					foreach ($groups as $group) {
						?>
						<option><?php echo $group->organisation ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<span class="errorMessage"><?php echo form_error('registerFaculty'); ?></span>

			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
				<input type="text" id="registerEmail" name="registerEmail" placeholder="Email Address" class="form-control text-input" value="<?php echo set_value('registerEmail'); ?>">
			</div>
			<span class="errorMessage"><?php echo form_error('registerEmail'); ?></span>

			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
				<input type="tel" id="registerContact" name="registerContact" placeholder="Contact No." class="form-control text-input" value="<?php echo set_value('registerContact'); ?>">
			</div>
			<span class="errorMessage"><?php echo form_error('registerContact'); ?></span>

			<div class="form-group">
				<button class="btn-UQ">Register</button>
			</div>
			</form>
		</div>
	</div>
</div>
<script>
	$('.selectpicker').selectpicker({
		iconBase: 'fa',
		tickIcon: 'fa-check'
	});
</script>
</body>
</html>