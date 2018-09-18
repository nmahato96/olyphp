function register_check(){
	$(".spinner").fadeIn();
	var name = $("#name_reg").val();
	var email = $("#email_reg").val();
	var pass = $("#pass_reg").val();
	var cpass = $("#cpass_reg").val();
	var regex = /^[a-zA-Z ]{2,30}$/;
	if( name=="" || email=="" || pass=="" || cpass=="" ){
		alert("Please fill all fields");
		$(".spinner").fadeOut();
	}else{
		if( pass==cpass){

			if (regex.test(name)) {
				var querystring="name="+name+"&email="+email+"&pass="+pass+"&cpass="+cpass;
				$.ajax({
					url: "register_check.php",
					type: "post",
					data: querystring,
					success: function (response) {
							//var obj=JSON.parse(response);
							if( response == "true" ){
								$(".registration").remove();
								$(".form_title").remove();
								$(".reg_mail_ver_panel").removeClass("no_display");
								
							}else{
								alert(response);
							}
							$(".spinner").fadeOut();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(textStatus, errorThrown);
						}
					});
			}
			else {

				alert("Enter Valid Name.");
				$(".spinner").fadeOut();
			}
		}
		else{
			alert("Passwords don't match");
			$(".spinner").fadeOut();
		}
	}
}

function login_check(){
	$(".spinner").fadeIn();

	var email = $("#l_email").val();
	var pass = $("#l_pass").val();
	if (email=="" || pass=="") {
		alert("Fill all fields!");
	}else{
		var querystring="email="+email+"&pass="+pass;
		$.ajax({
			url: "login_verify.php",
			type: "post",
			data: querystring,
			success: function (response) {
				var val=response.trim();
				console.log(response);
				if (val=="login") {
					window.location= "http://localhost/oly/olyphp/index.php";
				}else if(val=="link"){
					alert("A link was sent to your mail. Click to Register!");
				}else{
					alert("Wrong Credentials!");
				}


			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
	


}

function del_ad(){
	var id=document.getElementById("ad_view_id").innerHTML;
	var querystring="pid="+id;
	$.ajax({
		url: "del_ad.php",
		type: "post",
		data: querystring,
		success: function (response) {
			var st=response.trim();
			if (st=="deleted") {
				alert("Ad is deleted!");
				window.location= "http://localhost/oly/olyphp/index.php";
			}else if(st=="not"){
				alert("Ad not found!");
				window.location= "http://localhost/oly/olyphp/index.php";
			}else{
				alert("Something went wrong!");
				window.location= "http://localhost/oly/olyphp/index.php";
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}

function validate(){
	var city=document.getElementById("product_city_input").value;
	if (city=="Delhi" || city=="Mumbai" || city=="Kolkata" || city=="Bangalore") {
		return true;
	}else{
		alert("We don't serve in this city yet!");
		return false;
	}
}


function del_pro_dashboard(obj){
	var r=confirm("Are you sure?");
	if(r==true){
		var id=$(obj).siblings(".pro_id_del").html();
		var querystring="pid="+id;
		$.ajax({
			url: "del_ad.php",
			type: "post",
			data: querystring,
			success: function (response) {
				window.location= "http://localhost/oly/olyphp/dashboard.php";
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}else{

	}
}

function deactivate_ad(obj){
	var id=$(obj).siblings(".pro_id_del").html();
	var querystring="pro_id="+id;
		$.ajax({
			url: "product_status2.php",
			type: "post",
			data: querystring,
			success: function (response) {
				window.location= "http://localhost/oly/olyphp/dashboard.php";
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
}

function activate_ad(obj){
	var id=$(obj).siblings(".pro_id_del").html();
	var querystring="pro_id="+id;
		$.ajax({
			url: "product_status.php",
			type: "post",
			data: querystring,
			success: function (response) {
				window.location= "http://localhost/oly/olyphp/dashboard.php";
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
}

$(document).ready(function(){
	// $("#uploadForm").on('submit',function(){
		

		// $.ajax({
						// url: "up.php",
						// type: "post",
						// data: new FormData(this),
						// success: function (response) {
							
							// console.log(response);
							
						// },
						// error: function(jqXHR, textStatus, errorThrown) {
							// console.log(textStatus, errorThrown);
					// }
			// });
	// });
});
