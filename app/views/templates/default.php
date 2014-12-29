<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pettracker</title>
	
	<?php echo HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
	<?php echo HTML::style('media/css/style.css'); ?>

</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/" class="navbar-brand">Pettracker</a>
		</div>
		
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav pull-right">
				<li>
					<a href="/">Index</a>
				</li>
				<li>
					<a href="/about">About</a>
				</li>
			</ul>
		</div>
		
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-10">
			
			<div id="content">
				<?php echo $view; ?>
			</div>
		</div>
		<div class="col-xs-2">
			<?php if(Auth::check()): ?>
				Logged in as <?php echo Auth::user()->username; ?> - <a href="/user/logout" title="Log out">Log out</a>
			<?php else: ?>
				<form role="form" action="/user/login" method="post">
					<div class="form-group">
						<label for="auth-username">Username or e-mail:</label>
						<input type="text" placeholder="Your username or e-mail address" id="auth-username" name="username" class="form-control" />
					</div>
					<div class="form-group">
						<label for="auto-password">Password:</label>
						<input type="password" id="auth-password" placeholder="Your password..." name="password" class="form-control" />
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember" value="yes" /> Keep me logged in
						</label>
					</div>
					<div class="form-group text-right">
						<button class="btn btn-primary">Log in</button>
						<p>
							or <a href="/user/signup" title="Sign up">Sign up</a>
						</p>
					</div>
				</form>
			<?php endif; ?>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	var notes = <?php echo site::notes(); ?>;
</script>

<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'); ?>
<?php echo HTML::script('bower_components/jgrowl/jquery.jgrowl.min.js'); ?>
<?php //echo HTML::script('bower_components/handlebars/handlebars.min.js'); ?>
<?php //echo HTML::script('bower_components/ember/ember.min.js'); ?>
<?php //echo HTML::script('bower_components/ember-data/ember-data.min.js'); ?>
<?php echo HTML::script('media/js/global.js'); ?>
<?php //echo HTML::script('media/js/app.js'); ?>

</body>
</html>
