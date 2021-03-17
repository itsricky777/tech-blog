<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/login-signup.css">
</head>
<body>
	<div class="form-structor">
		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
			<form method="post" action="<?php echo site_url();?>signup/save">
				<div class="form-holder">
					<input type="text" class="input" name="username" placeholder="Name" />
					<input type="email" class="input" name="email" placeholder="Email" />
					<input type="password" class="input" name="password" placeholder="Password" />
				</div>
				<button class="submit-btn" name="submit">Sign up</button>
			</form>
		
		</div>
		<div class="login slide-up">
			<div class="center">
				<h2 class="form-title" id="login"><span>or</span>Log in</h2>
				<form method="post" action="<?php echo site_url();?>login/process">
					<div class="form-holder">
						<input type="email" class="input" name="email" placeholder="Email" />
						<input type="password" class="input" name="password" placeholder="Password" />
				</div>
				<button class="submit-btn" name="submit">Log in</button>
			</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url();?>public/js/login-signup.js"></script>
</body>
</html>