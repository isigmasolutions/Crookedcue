

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

jQuery('.location,.getTable').hover(function(){     
           jQuery('.header').addClass('white');    
       },function(){    
          jQuery('.header').removeClass('white');     
       });






jQuery(".hamburger").click(function(){
  jQuery(".hamburger-icon").toggleClass("cross");
});


  jQuery(".hamburger").click(function(){
   jQuery(".hamburger .sub-menu").toggle();
});



jQuery('body.page-template-get-table .topNav .getTable' ).attr('href' , '/get-a-table');


  
  var scrollLink = jQuery('.scroll');
  
  // Smooth scrolling
  //scrollLink.on('click',function(e) {
    var cvcv  =0;
jQuery(document).on('click', ".scroll", function(e) { 
    e.preventDefault();
    var cl8icked8item = jQuery(this).attr('href');
    jQuery('body,html').animate({
      scrollTop: jQuery(this.hash).offset().top
    }, 800 );
    var trueval = 1;
    customescroll(trueval , cl8icked8item);
  });
  
  //Active link switching
  function customescroll(trueval , cl8icked8item){ 
  	if(trueval == 1){ 
  		//trueval = 2;
  		jQuery(cl8icked8item).addClass('margintoponcurrentitem');
  		// jQuery('.shiftrowonscroll').addClass('scrollActivemyy');
  		 jQuery('.margintoponcurrentitem').css('margin-top', '120px');
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

var removeClass = true;
$(".location").click(function () {
    $(".header-meta").toggleClass('hide');
    removeClass = false;
});

$(".header-meta").click(function() {
    removeClass = false;
});


 jQuery(document).ready(function() {
jQuery('.appendpartyhtml .RestaurantArea .multi-cart-check input[type="checkbox"]').removeAttr('disabled');
/////// Dropdown onchange location  
function ajaxcall(checkvalue){

  jQuery.ajax({
      type: "POST",
      //async: false,
      url: '/wp-admin/admin-ajax.php',
      beforeSend: function() { 
                jQuery('body').addClass("loading");  
                jQuery('body').append('<div class="modalgif"></div>');
              },
        complete: function() { 
          jQuery('body').removeClass("loading"); 
          jQuery('.modalgif').remove();
        },
      data: {'action':'getlocationdata', 'locationname': checkvalue},
      success: function(data){ 
           obj = jQuery.parseJSON(data);   
          
        var locationname = obj.locationname+'<br>'+obj.location_address;                     
        jQuery('#locationimage').attr('src' , obj.image);
        jQuery('#locationaddress').html(locationname);
        jQuery('#locationphone').html(obj.locationphone);
        jQuery('#locationphone').attr('href' , obj.locationphone);
        jQuery('#appendsidebarlocations').html(obj.sidebarcat);
        
        var showdive = obj.display;
        var showdivenone = obj.displaynone;
       // alert('.'+showdive+'dive');
        jQuery('.'+showdive+'dive').show();
        jQuery('.'+showdivenone+'dive').hide();
        jQuery('.noneorhide').show();
        jQuery('.onchangelocation').show();
        //jQuery('#autoclick').trigger();
        jQuery('#autoclick').trigger('click');

        jQuery('.appendpartyhtml .RestaurantArea .multi-cart-check input[type="checkbox"]').removeAttr('disabled');        
        jQuery('.removeuickview').remove();

        jQuery('.appendpartyhtml .RestaurantArea .multi-cart-check input[type="checkbox"]').each(function(){
          var getproductid = jQuery(this).val();
          //jQuery(this).hide();
          
          jQuery(this).addClass('quick_view');
          jQuery(this).attr('data-product-id' , getproductid);
          jQuery(this).parent().parent().parent().next().next().next().next().after('<a style="width:23%" data-product-id="'+getproductid+'" class="quick_view button removeuickview">View Options</a>');
          //jQuery(this).parent().before('<div class="checkccc"><input type="checkbox" value="494" class="quick_view checkboxchecked" data-product-id="'+getproductid+'"></div>');
          //jQuery(this).after('<a data-product-id="'+getproductid+'" class="quick_view button removeuickview">View Options</a>');
        jQuery(this).removeAttr('disabled');

        });
        //// Add View button for all products
        jQuery('.appendpartyhtml .appendquickview table button[name="add-to-cart"]').each(function(){
          var getproductid = jQuery(this).val();
          //alert(getproductid);
          //jQuery(this).wrap('<a data-product-id="'+getproductid+'" class="quick_view button">');
          
          
         // jQuery(this).after('<a data-product-id="'+getproductid+'" class="quick_view button removeuickview">View Options</a>');
        
        });
//// Add View button for variation products
        jQuery('.appendpartyhtml .appendquickview table input[name="add-to-cart"]').each(function(){
          var getproductid = jQuery(this).val();
                   
          //jQuery(this).hide();
          jQuery(this).after('<a data-product-id="'+getproductid+'" class="quick_view button removeuickview">View Options</a>');
        
        });   

        
        //jQuery('.appendpartyhtml #RestaurantArea .variations_form.cart.initialised').hide();

          
    }
      
  });
}



//////// Drop down onchange function

  jQuery('#locationonchange').on('change' , function(){

    var checkvalue = jQuery(this).val();
    
    if(checkvalue == 0){
       jQuery('.noneorhide').hide();
    }
    else{
       
       ajaxcall(checkvalue);
    }
   
  })


/////// Auto Select location 

url = window.location.href;
var parts = url.split("/");
var last_part = parts[parts.length-1];
//alert(last_part);
if(last_part == "?Mississauga") {
//alert("control");
jQuery('#locationonchange option[value=Mississauga]').attr("selected", "selected").trigger('change');
ajaxcall('Mississauga')
//jQuery('#locationonchange').val('Mississauga').click();

} if(last_part == "?Etobicoke") {
jQuery('#locationonchange option[value=Etobicoke]').attr("selected", "selected").trigger('change');
ajaxcall('Etobicoke')
//jQuery('#locationonchange').val('Etobicoke').change();
/* jQuery('#locationonchange').find('option[value=Etobicoke]').attr('selected','selected');*/
}

 });

    // jQuery( 'body' ).on( 'click', 'checkboxchecked', function() { alert('asasasas');
    //     jQuery('.checkboxchecked').attr('disabled');

    // });


    jQuery( 'body' ).on( 'added_to_cart', function( e, fragments, cart_hash, this_button ) {
        
        var getnumberofguest = jQuery('#numberofguest').val();
        var partyCostcarttotal = jQuery('.partyCost .header-cart-total').text();
        //alert(partyCostcarttotal);
        removehtml =  partyCostcarttotal; 
        newString = removehtml.replace('$', ''); 
        //alert(newString);
        var getpersiontotalplate = newString / getnumberofguest;
        jQuery('#personcost').html('$'+getpersiontotalplate);

        jQuery('.appendpartyhtml .RestaurantArea .multi-cart-check input[type="checkbox"]').removeAttr('disabled');    
        jQuery('body').trigger('click');
        jQuery('.remodal-close').trigger('click');
    } );

function checkorvieworder(url){

    var getpartyinfo = jQuery('#PartyInformationform').serializeArray();
    var getorganizerinfo = jQuery('#OrganizerInfoform').serializeArray();
    var getpartyname = jQuery('#nameofparty').val();
    var locationname = jQuery('#locationonchange').val();
    var extraguest = jQuery('#extraguest').val();


      jQuery.ajax({
      type: "POST",
      //async: false,
      beforeSend: function() { 
                jQuery('body').addClass("loading");  
                jQuery('body').append('<div class="modalgif"></div>');
              },
        complete: function() { 
          jQuery('body').removeClass("loading"); 
          jQuery('.modalgif').remove();
        },
      url: '/wp-admin/admin-ajax.php',
      data: {'action':'setsession', 'partyinfo': getpartyinfo, 'organizerinfo' : getorganizerinfo , 'partyname' :getpartyname , 'extraguest' : extraguest , 'locationname' : locationname},
      success: function(data){ 
        //alert('sssss');
        window.location.href = url;
      }
  });    
}


 jQuery(document).ready(function(){
///////// Confirmation of rsvp ajax
jQuery('#rsvp_process').on('click' , function(){
    var getrsvpformdata = jQuery('#rsvpform').serializeArray();
    //var guestlist = jQuery('#AdditionalGuesthtml').serialize();

    jQuery.ajax({
      type: "POST",
      //async: false,
      beforeSend: function() { 
                jQuery('body').addClass("loading");  
                jQuery('body').append('<div class="modalgif"></div>');
              },
        complete: function() { 
          jQuery('body').removeClass("loading"); 
          jQuery('.modalgif').remove();
        },
      url: '/wp-admin/admin-ajax.php',
      data: {'action':'rsvpconfirmation', getrsvpformdata},
      success: function(data){ 
        //alert('sssss');
        if(data == 200){
          window.location.href = 'rsvp-thank-you';
        }
        if(data == 301){
          jQuery('.errormessage').html('You are already in the list. ');
        }
        else{
          jQuery('.errormessage').html('Something went worng please try again! ');
        }
        //
      }
  });

})


/////// Send Email to users for rsvp

jQuery('#sendemailtousers').on('click' , function(){
    
    var getemails = jQuery('#emailaddress').val();
    var getrsvplink = jQuery('#rsvplink').val();
    var getfromid = jQuery('#idfrom').val();
    var getfromemail = jQuery('#emailfrom').val();

    var postid = jQuery('#postid').val();
    var partydate = jQuery('#partydate').val();
    var eventlocation = jQuery('#eventlocation').val();
    //var getfromemail = jQuery('#emailfrom').val();

    jQuery.ajax({
      type: "POST",
      //async: false,
      beforeSend: function() { 
                jQuery('body').addClass("loading");  
                jQuery('body').append('<div class="modalgif"></div>');
              },
        complete: function() { 
          jQuery('body').removeClass("loading"); 
          jQuery('.modalgif').remove();
        },
      url: '/wp-admin/admin-ajax.php',
      data: {'action':'senrevplink', 'emails' : getemails, 'rsvplink' :getrsvplink, 'fromid':getfromid,'fromemail':getfromemail , 'postid':postid , 'partydate': partydate, 'eventlocation':eventlocation},
      success: function(data){ 
        //alert('sssss');
        if(data == 200){
          jQuery('.responcemessage').html('email sent successfully! ');
        }
        else{
          jQuery('.responcemessage').html('Something went worng please try again! ');
        }
        //
      }
  });

})

});
<!--------------------------------------------->
