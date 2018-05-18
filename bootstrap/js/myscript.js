$(function() {
	$("#Register a:contains('Register')").parent().addClass('active');
	$("#Home a:contains('Home')").parent().addClass('active');
	$("#Articles a:contains('Articles')").parent().addClass('active');
	$("#Contact a:contains('Contact')").parent().addClass('active');
	$("#About a:contains('About')").parent().addClass('active');

	//make menus drop automatically
	$('ul.nav li.dropdown').hover(function() {
		$('.dropdown-menu', this).fadeIn();
	}, function() {
		$('.dropdown-menu', this).fadeOut('fast');
	});//hover

	
	
	
	
// change the font color of the whole document <a> tag 	

$("header a").each(function() {
	if ( this.style.color = "white" ) {
      this.style.color = "#B8A6B4";
    } else {
      this.style.color = "black";
    }
	

  });
	
	

  var message="This function is not allowed here.";
           function clickIE4(){
                 if (event.button==2){
                     alert(message);
                     return false;
                 }
           }
           function clickNS4(e){
                if (document.layers||document.getElementById&&!document.all){
                        if (e.which==2||e.which==3){
                                  //alert(message);
                                  return false;
                        }
                }
           }
           if (document.layers){
                 document.captureEvents(Event.MOUSEDOWN);
                 document.onmousedown=clickNS4;
           }
           else if (document.all&&!document.getElementById){
                 document.onmousedown=clickIE4;
           }
           document.oncontextmenu=new Function("return false;")





 
});
