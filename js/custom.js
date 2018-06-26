function register_check(){
	var name = $("#name_reg").val();
	var email = $("#email_reg").val();
	var pass = $("#pass_reg").val();
	var cpass = $("#cpass_reg").val();
	if( name=="" || email=="" || pass=="" || cpass=="" ){
		alert("Please fill all fields");
	}else{
		if( pass==cpass){
			var querystring="name="+name+"&email="+email+"&pass="+pass+"&cpass="+cpass;
			$.ajax({
						url: "register_check.php",
						type: "post",
						data: querystring,
						success: function (response) {
							//var obj=JSON.parse(response);
							if( response == "true" ){
								$(".registration").remove();
								$(".reg_mail_ver_panel").removeClass("no_display");
							}else{
								alert(response);
							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
					}
			});
		
		}
		else{
			alert("Passwords don't match");
		}
	}
}
						