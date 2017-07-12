$(document).ready(function()
{
$("#username").change(function() 
{ 

var username = $("#username").val();
var msgbox = $("#status");


if(username.length > 3)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "check_ajax.php",  
    data: "username="+ username,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request){ 

	if(msg == 'OK')
	{ 
	
	    $("#username").removeClass("red");
	    $("#username").addClass("green");
        msgbox.html('<font color="Green"> Available </font>  ');
	}  
	else  
	{  
	     $("#username").removeClass("green");
		 $("#username").addClass("red");
		msgbox.html(msg);
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#username").addClass("red");
$("#status").html('<font color="#cc0000">Enter valid User Name</font>');
}



return false;
});

$("#email").change(function() 
{ 

var email = $("#email").val();
var msgbox = $("#statue");


if(email.length > 8)
{
$("#statue").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "check_email.php",  
    data: "email="+ email,  
    success: function(msg){  
   
   $("#statue").ajaxComplete(function(event, request){ 

	if(msg == 'OK')
	{ 
	
	    $("#email").removeClass("red");
	    $("#email").addClass("green");
        msgbox.html('<font color="Green"> Available </font>  ');
	}  
	else  
	{  
	     $("#email").removeClass("green");
		 $("#email").addClass("red");
		msgbox.html(msg);
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#email").addClass("red");
$("#statue").html('<font color="#cc0000">Enter valid email address</font>');
}



return false;
});

});
