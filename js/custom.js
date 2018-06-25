function register_check(){
	// var email=document.getElementById("email_reg").value;
	
	var email = $("#email_reg").val();
	var pass = $("#pass_reg").val();
	var cpass = $("#cpass_reg").val();
	
	var queystring="email="+email+"&pass"+pass+"&cpass"+cpass;
	$.ajax({
				url: "register_check.php",
				type: "post",
				data: querystring,
				success: function (response) {
					//var obj=JSON.parse(response);
					console.log(response);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
			}
	});
}
						