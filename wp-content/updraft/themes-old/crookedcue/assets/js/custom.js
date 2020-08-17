 // get header height (without border)
    var getHeaderHeight = $('.headerContainerWrapper').outerHeight();

    // border height value (make sure to be the same as in your css)
    var borderAmount = 2;

    // shadow radius number (make sure to be the same as in your css)
    var shadowAmount = 30;

    // init variable for last scroll position
    var lastScrollPosition = 0;

    // set negative top position to create the animated header effect
    $('.headerContainerWrapper').css('top', '-' + (getHeaderHeight + shadowAmount + borderAmount) + 'px');

    $(window).scroll(function() {
   	 var currentScrollPosition = $(window).scrollTop();

   	 if ($(window).scrollTop() > 1 * (getHeaderHeight + shadowAmount + borderAmount) ) {

   		 $('body').addClass('scrollActive').css('padding-top', getHeaderHeight);
   		 $('.headerContainerWrapper').css('top', 0);


   		 if (currentScrollPosition < lastScrollPosition) {
   			 $('.headerContainerWrapper').css('top', '-' + (getHeaderHeight + shadowAmount + borderAmount) + 'px');
   		 }
   		 lastScrollPosition = currentScrollPosition;

   	 } else {
   		 $('body').removeClass('scrollActive').css('padding-top', 0);

   	 }
});

 jQuery(document).ready(function(){

    jQuery('#time').timepicker({
        timeFormat: 'h:mm:ss p'
    });


     jQuery("#datepicker").datepicker();
		jQuery('.calender_icon').click(function() {
	jQuery("#datepicker").focus();
  });


  jQuery('#showmenu').click(function() {
                jQuery('.megamenu').slideToggle("fast");
        });


    $('ul#nav-tabs-wrapper li ').click(function(){
	    $('ul#nav-tabs-wrapper li').removeClass("active");
	    $(this).addClass("active");
	});

jQuery('.header').hover(function(){     
           jQuery('.header').addClass('white');    
       },function(){    
          jQuery('.header').removeClass('white');     
       });





});






 jQuery(document).ready(function() {
  
  var scrollLink = jQuery('.scroll');
  
  // Smooth scrolling
  scrollLink.click(function(e) {
    e.preventDefault();
    var cl8icked8item = jQuery(this).attr('href');
    jQuery('body,html').animate({
      scrollTop: jQuery(this.hash).offset().top
    }, 1000 );
    var trueval = 1;
    customescroll(trueval , cl8icked8item);
  });
  
  // Active link switching
  function customescroll(trueval , cl8icked8item){ 
  	if(trueval == 1){ 
  		//trueval = 2;
  		jQuery(cl8icked8item).addClass('margintoponcurrentitem');
  		// jQuery('.shiftrowonscroll').addClass('scrollActivemyy');
  		 jQuery('.margintoponcurrentitem').css('margin-top', '180px');
  }

	  jQuery(window).scroll(function() { 
	 //  	alert(trueval);
		// jQuery('.margintoponcurrentitem').removeAttr('style');
		// jQuery('.margintoponcurrentitem').removeClass('margintoponcurrentitem');
	    var scrollbarLocation = jQuery(this).scrollTop();
	    
	    scrollLink.each(function() {
	      
	      var sectionOffset = jQuery(this.hash).offset().top;
	     
	      // if ( sectionOffset <= scrollbarLocation ) { alert('sdsd');
	      //   jQuery(this).parent().addClass('active');
	      //   jQuery(this).parent().siblings().removeClass('active');
	      // }
	    })
	    
	  })
	
  }
  
  jQuery(window).on('wheel', function(e) {

	var delta = e.originalEvent.deltaY;

 			if(delta == -3){
 				 jQuery('.margintoponcurrentitem').removeAttr('style');
		         jQuery('.margintoponcurrentitem').removeClass('margintoponcurrentitem');
 			}
		});
})