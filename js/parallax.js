$(document).ready(function() {


	var timer;
	var scrollY;
	var scrolling = false;

    function refresh () { 
        // do stuff
        //console.log('Stopped Scrolling'); 
if (scrolling != true) {
        if (scrollY < 500) {
			$('html, body').animate({
	    		scrollTop:0
	    	}, 400, function() {
		    	//parallaxScroll(); // Callback is required for iOS
			});
		} else {
			$('html, body').animate({
	    		scrollTop:1000
	    	}, 400, function() {
		    	//parallaxScroll(); // Callback is required for iOS
			});
		}
	}
    };
	
	redrawDotNav();
	
	/* Scroll event handler */
    $(window).bind('scroll',function(e){
    	//parallaxScrollSnap();
		//scrolling = true;
		clearTimeout(timer);
        timer = setTimeout( refresh , 1000 );
        scrollY = $(window).scrollTop();
		$('#scrollY').html(scrollY);
    	parallaxScroll();
    	
		redrawDotNav();
    });
    
	/* Next/prev and primary nav btn click handlers */
	$('a.manned-flight').click(function(){
    	$('html, body').animate({
    		scrollTop:0
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
	});

    $('a.frameless-parachute').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#frameless-parachute').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });

    $('a.english-channel').click(function(){
    	$('html, body').animate({
    		scrollTop:$('#english-channel').offset().top
    	}, 1000, function() {
	    	parallaxScroll(); // Callback is required for iOS
		});
    	return false;
    });
    
    /* Show/hide dot lav labels on hover */
    $('nav#primary a').hover(
    	function () {
			$(this).prev('h1').show();
		},
		function () {
			$(this).prev('h1').hide();
		}
    );
    
});

/* Scroll the background layers */
function parallaxScroll(){
	var scrolled = $(window).scrollTop();
	$('#parallax-bg1').css('top',(0-(scrolled*.25))+'px');
	$('#parallax-bg2').css('top',(0-(scrolled*.5))+'px');
	$('#parallax-bg3').css('top',(0-(scrolled*.75))+'px');
}

/* Scroll the background layers */
function parallaxScrollSnap(){
	




	//$('#parallax-bg1').css('top',(0-(scrollY*.25))+'px');
	//$('#parallax-bg2').css('top',(0-(scrollY*.5))+'px');
	//$('#parallax-bg3').css('top',(0-(scrollY*.75))+'px');
}

/* Set navigation dots to an active state as the user scrolls */
function redrawDotNav(){
	var section1Top =  0;
	// The top of each section is offset by half the distance to the previous section.
	var section2Top =  $('#frameless-parachute').offset().top - (($('#english-channel').offset().top - $('#frameless-parachute').offset().top) / 2);
	var section3Top =  $('#english-channel').offset().top - (($(document).height() - $('#english-channel').offset().top) / 2);
	var section4Top =  4000;
	$('nav#primary a').removeClass('active');
	if($(document).scrollTop() >= section1Top && $(document).scrollTop() < section2Top){
		$('nav#primary a.manned-flight').addClass('active');
	} else if ($(document).scrollTop() >= section2Top && $(document).scrollTop() < section3Top){
		$('nav#primary a.frameless-parachute').addClass('active');
	} else if ($(document).scrollTop() >= section3Top && $(document).scrollTop() < section4Top){
		$('nav#primary a.english-channel').addClass('active');
	}
	
}
