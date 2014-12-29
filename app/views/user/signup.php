<h2>Sign up</h2>

<form role="form" action="/user/signup" method="post">
	<div class="form-group<?php echo ($messages->has('email')?' has-error':''); ?>">
		<label for="auth-email">Your e-mail:</label>
		<input type="text" placeholder="Your e-mail address" id="auth-email" value="<?php echo Input::get('email'); ?>" name="email" class="form-control" />
		<?php if($messages->has('email')): ?>
			<span class="help-block"><?php echo $messages->first('email'); ?></span>
		<?php endif; ?>
	</div>
	<div class="form-group<?php echo ($messages->has('username')?' has-error':''); ?>">
		<label for="auth-username">Desired username:</label>
		<input type="text" placeholder="Your desired username" id="auth-username" value="<?php echo Input::get('username'); ?>" name="username" class="form-control" />
		<?php if($messages->has('email')): ?>
			<span class="help-block"><?php echo $messages->first('username'); ?></span>
		<?php endif; ?>
	</div>
	<div class="form-group<?php echo ($messages->has('password')?' has-error':''); ?>">
		<label for="auto-password">Password:</label>
		<input type="password" id="auth-password" placeholder="Your password..." name="password" class="form-control" />
		<?php if($messages->has('email')): ?>
			<span class="help-block"><?php echo $messages->first('password'); ?></span>
		<?php endif; ?>
	</div>
	<div class="form-group text-right">
		<button class="btn btn-primary">Sign up</button>
	</div>
</form>