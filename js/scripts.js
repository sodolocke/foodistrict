//@codekit-prepend "jquery.js";
//@codekit-prepend "jquery-ui-1.8.23.custom.min.js";
//@codekit-prepend "jquery.mobile.custom.min.js";
//@codekit-prepend "bootstrap.min.js";
//@codekit-prepend "jquery.infinitescroll.min.js";

/* Author: no4design.com */
$(function() {	
  	var $container = $('#posts');
	$container.infinitescroll({
	   navSelector  : '#page-nav',    // selector for the paged navigation 
      nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
      itemSelector : '.post',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'Loaded',
          msgText: "Loading..."
        }
	  },
	  function( newElements ) {}
	);
	$('#page-nav').hide();
	
	$(".carousel").each(function(){
		$(this).swipeleft(function() {  
			$(this).carousel('next');  
		});
		$(this).swiperight(function() {  
			$(this).carousel('prev');  
		});
	});
});




















