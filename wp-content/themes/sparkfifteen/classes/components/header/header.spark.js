(function($){
	

// Spark Application
  var AppView = Backbone.View.extend({
  		el: 'header.spark-header',

  		// Default Variables for Application
  		defaults: function() {
  			return {

  			}
  		},

  		//Delegated Events for user actions
  		events: {
      		"click .search-button": "doMobileSearch",
  		},


  		//Initialization function
  		initialize: function(){
  			this.doSidr();
  		},

  		doSidr: function(){
			$('.mobile-menu').sidr({
				side: 'left',
				source: 'nav.full-width-nav'
			});	
  		}, 
  		doMobileSearch: function(){
  			var elem = $(".mobile-search");
  			if ( !elem.length ){
	   			var mobileSearch = $("<div class='mobile-search open'></div>");
	  			$('.widget_search').clone().appendTo(mobileSearch);
	  			mobileSearch.appendTo($(this.el))
  			} else {
  				elem.toggleClass('open');
  			}

  		}
  });


  $(document).ready(function(){
  		var App = new AppView;
  })
  



})(jQuery);