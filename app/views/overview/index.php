<h2>Overview</h2>

<div id="app"></div>

<script type="text/x-handlebars">
	{{outlet}}
</script>

<script type="text/x-handlebars" data-template-name="index">
	Handlebars template index output
	{{#each households}}
		{{name}}
	{{/each}}
</script>