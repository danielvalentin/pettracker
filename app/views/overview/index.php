<div id="app"></div>

<script type="text/x-handlebars">	
	{{outlet}}
</script>

<script type="text/x-handlebars" data-template-name="households">
	<div class="row">
	<div class="col-xs-3">
			<h3>Overview</h3>
			<ul class="nav">
				{{#each household in model.households}}
					<li>{{#link-to 'household' household.id}}{{household.name}}{{/link-to}}</li>
				{{/each}}
			</ul>
			<hr />
			<button {{action 'addHousehold'}} class="btn btn-default">Add household</button>
		</div>
		<div class="col-xs-9">
			{{outlet}}
		</div>
	</div>
</script>

<script type="text/x-handlebars" data-template-name="households/index">
	index?
</script>

<script type="text/x-handlebars" data-template-name="household">
	<h2>{{name}}</h2>
	<hr />
	<div class="row">
		<div class="col-xs-3">
			<strong>Pets</strong>
			<ul class="nav">
			{{#each pet in pets}}
				<li>{{#link-to 'pet' pet.id}}{{pet.name}}{{/link-to}}</li>
			{{/each}}
			</ul>
			<hr />
			<button {{action 'addPet'}} class="btn btn-default">Add pet</button>
		</div>
		<div class="col-xs-9">
			{{outlet}}
		</div>
	</div>
</script>

<script type="text/x-handlebars" data-template-name="pet">
	<h3>{{name}}</h3>
	<hr />
	<h4>Events:</h4>
	<ul>
		{{#each event in petevents}}
			<li>{{event.text}} - {{event.created_at}}</li>
		{{/each}}
	</ul>
	{{input type="text" value=eventtext}}
	<button {{action 'addEvent'}} class="btn btn-default">Add event</button>
</script>

