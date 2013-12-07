// This file checks if a username is available using AJAX to check.php
$(document).ready(function(){
    $("#username").change(function(){ 
	var username=$("#username").val();
	$.ajax({
	    type:"post",
	    url:"/php/check.php",
	    data:"username="+username,
	    success:function(data) {
		if(data == 0) {
		    $("#available").html("Username available");
		    $("#submit").removeAttr('disabled');
		} else {
		    $("#available").html("Username already taken");
		    $("#submit").attr('disabled', 'disabled');
		}
	    }
	}); 
    });
    $("#pw2").change(function(){ 
	if ($("#pw").val() != $("#pw2").val()) {
	    $("#match").html("Passwords do not match.");
	    $("#submit").attr('disabled', 'disabled');
	} else {
	    $("#match").html("");
	    $("#submit").removeAttr('disabled');
	}
    });
    $("#pw").change(function(){ 
    	if ($("#pw").val() != $("#pw2").val()) {
 	      $("#match").html("Passwords do not match.");
 	      $("#submit").attr('disabled', 'disabled');
 	} else {
 	      $("#match").html("");
 	      $("#submit").removeAttr('disabled');
 	}
    });
});
