var App = Ember.Application.create({
	LOG_TRANSITIONS:true,
	rootElement:'#content'
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
	namespace:'api'
});

App.Store = DS.Store.extend({
	adapter:'App.ApplicationAdapter'
});


