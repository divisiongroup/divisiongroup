(function($){
	$(document).foundation();
	//js code here
	$ = jQuery;

    // window scroll function
    $(window).scroll(function() {

    	var winWidth = $(window).width();

    	if(winWidth >= 1024){

    		var scroll = $(window).scrollTop();
			var target = $("#poop").offset();

	        if (scroll >= target.top - 200) {

	            $("#menu").css({"display": 'none'});
	            $(".menu-icon").fadeIn( "fast" );

	        } else {

	        	$("#menu").fadeIn( "fast" );
	            $(".menu-icon").css({"display": 'none'});

	        }
    	}
    });

    // window resize function
    var id;
	$(window).resize(function() {
	    clearTimeout(id);
	    id = setTimeout(doneResizing, 500);
	    
	});

	function doneResizing(){

	  var winWidth = $(window).width();

	  if(winWidth >= 1024){

	  	$("#menu").fadeIn( "fast" );
	  	$(".menu-icon").css({"display": 'none'});

	  } else {

	  	$("#menu").css({"display": 'none'});
	  	$(".menu-icon").fadeIn( "fast" );

	  }

	}

})(jQuery);
