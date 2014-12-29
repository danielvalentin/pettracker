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


