<!DOCTYPE html>
<html lang="en">
<head>
<title>Pettracker</title>

<?php echo HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>
<?php echo HTML::style('media/css/style.css'); ?>

</head>
<body>

<h1>Hello world</h1>

<script type="text/x-handlebars">
	{{outlet}}
</script>

<script type="text/x-handlebars" data-template-name="index">
	INDEX
</script>

<?php echo HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'); ?>
<?php echo HTML::script('bower_components/handlebars/handlebars.min.js'); ?>
<?php echo HTML::script('bower_components/ember/ember.min.js'); ?>
<?php echo HTML::script('bower_components/ember-data/ember-data.min.js'); ?>
<?php echo HTML::script('media/js/app.js'); ?>

</body>
</html>
