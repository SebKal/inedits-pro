jQuery(document).ready(function($){

	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	QuickSidebar.init(); // init quick sidebar

	ComponentsEditors.init(); //init WYSIWYG editor

	TableManaged.init(); // init Table management


	// Sneak That Scroll !
	(function(window){

		var sneaky = new ScrollSneak(location.hostname);

		/*document.getElementById('haha').onclick = sneaky.sneak;*/

		$('.btn[type="submit"]').live("click", function(){
			sneaky.sneak();
		});

	}(window));

	// Dismiss bootstrap alerts
	(function(window){

		var alert = $('.alert');

		setTimeout(function() {alert.addClass('cshide');}, 1500);

	}(window));

});
