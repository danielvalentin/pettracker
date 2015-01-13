/* Config */
App = Ember.Application.create({
	LOG_TRANSITIONS:true,
	rootElement:'#app'
});

App.ApplicationAdapter = DS.RESTAdapter.extend({
	namespace:'api'
});

/* Models */
App.Household = DS.Model.extend({
	user_id:DS.attr('number'),
	name: DS.attr('string'),
	created_at: DS.attr('string'),
	updated_at: DS.attr('string'),
	pets: DS.hasMany('pet', {async:true})
});

App.Pet = DS.Model.extend({
	household_id: DS.attr('number'),
	user_id: DS.attr('number'),
	name: DS.attr('string'),
	created_at: DS.attr('string'),
	updated_at: DS.attr('string'),
	household: DS.belongsTo('household'),
	petevents: DS.hasMany('petevent')
});

App.Petevent = DS.Model.extend({
	pet_id: DS.attr('number'),
	user_id: DS.attr('number'),
	text: DS.attr('string'),
	created_at: DS.attr('string'),
	updated_at: DS.attr('string'),
	household: DS.belongsTo('household'),
	pet: DS.belongsTo('Pet')
});

/* Router mapping */
App.Router.map(function(){
	this.resource('households', {path:'/'}, function(){
		this.resource('household', {path:'/:id'}, function(){
			this.resource('pet', {path:'/pet/:pet_id'});
		});
	});
});

/* Specific routes? */

// Households
App.HouseholdsRoute = Ember.Route.extend({
	model:function(params){
		return {
			households:this.store.find('household')
		};
	}
});

App.HouseholdsController = Ember.ObjectController.extend({
	actions:{
		addHousehold:function(){
			var name = prompt('Name of your new household:');
			if(name && name.length > 0)
			{
				var household = this.store.createRecord('household',{
					name:name,
				});
				household.save();
			}
		}
	}
});

// Households.household
App.HouseholdController = Ember.ObjectController.extend({
	actions:{
		addPet:function(){
			var name = prompt('Name of your pet:');
			var model = this.model;
			if(name && name.length > 0)
			{
				var pet = this.store.createRecord('pet', {
					household_id:model.id,
					name:name
				});
				pet.save();
				model.get('pets').pushObject(pet);
			}
		}
	}
});

App.HouseholdRoute = Ember.Route.extend({
	model:function(params){
		return this.store.find('household', params.id);
	}
});

// Pet
App.PetRoute = Ember.Route.extend({
	/*model:function(params){
		return this.store.find('pet', params.id);
	}*/
});

App.PetController = Ember.ObjectController.extend({
	eventtext:'',
	actions:{
		addEvent:function(){
			var self = this;
			var model = self.model;
			var petevent = this.store.createRecord('petevent', {
				text:self.eventtext,
				pet_id:model.id
			});
			petevent.save();
			self.model.get('petevents').pushObject(petevent);
		}
	}
});

