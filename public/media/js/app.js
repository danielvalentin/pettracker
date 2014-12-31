/* Config */
var App = Ember.Application.create({
	LOG_TRANSITIONS:true,
	rootElement:'#app'
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
	namespace:'api'
});

App.Store = DS.Store.extend({
	adapter:'App.ApplicationAdapter'
});

/* Models */
App.User = DS.Model.extend({
	email:DS.attr('string'),
	username:DS.attr('string'),
	created_at:DS.attr('string'),
	updated_at:DS.attr('string')
});

App.Household = DS.Model.extend({
	user_id:DS.attr('int'),
	name:DS.attr('string'),
	created_at:DS.attr('string'),
	updated_at:DS.attr('string')
});

/* Meat & potatoes */
App.IndexRoute = Ember.Route.extend({
	model:function(params){
		return {
			households:this.store.find('household')
		};
	}
});
