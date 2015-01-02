// Spark Backbone JS application

(function($){

// Spark Application
  var AppView = Backbone.View.extend({
  		el: '#spark_application',

  		// Default Variables for Application
  		defaults: function() {
  			return {

  			}
  		},

  		//Delegated Events for user actions
  		events: {
      		"click .spark-test": "doSomething",
  		},


  		//Initialization function
  		initialize: function(){
        console.log('init');
  		},

  		doSomething: function(){
  			console.log('HERE!');
  		}
  });


  $(document).ready(function(){
  		var App = new AppView;
  })
  

})(jQuery);