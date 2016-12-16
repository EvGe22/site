$(document).ready(function(){

	var loginFrom = $('#login-form');
	var loginPage = $('.login-page');
	var blank = $('#blank');
	var listener = function(){
		loginPage.toggle();
		blank.toggle();
	};

	var regLink = $('#register-login');
	var login = $('#login');
	var pass = $('#pass');
	var pass2 = $('#pass2');
	var first_name = $('#first_name');
	var last_name = $('#last_name');
	var type = $('#type');
	var loginButton = $('#login-button');
	var failMsg = $('#fail');
	var state = "LOGIN";

	var fail = function(string){
		failMsg.html(string);
		failMsg.effect("shake", {times:2, distance: 10}, 1000 );
	};


	var registerEvent = function(event){
		event.preventDefault();

		if (login.val() == "" || pass.val() == ""  || 
			pass2.val() == "" || first_name.val() == "" ||
			last_name.val() == ""){
			fail("All fields are required");
			return;
		}

		if (pass.val() != pass2.val()){
			fail("Passwords don't match");
			return;
		}

		$.ajax({
			method: "POST",
			url: "submit.php",
			data: {type: "REGISTER" , login: login.val(), 
				password: pass.val(), first_name: first_name.val(), 
				last_name: last_name.val()}
		})
		  .done(function( msg ) {
			if (msg == "Success"){
				location.reload(true);
			} else if (msg == "Fail"){
				fail("User with such login already exists");				
			} else {
				console.log(msg);
			}
		  });
	};

	var loginEvent = function(event){
		event.preventDefault();

		if (login.val() == "" || pass.val() == ""){
			fail("Login and pass required");
			return;
		}

		$.ajax({
			method: "POST",
			url: "submit.php",
			data: {type: "LOGIN", login: login.val(), password: pass.val()}
		})
		  .done(function( msg ) {
			if (msg == "Success"){
				location.reload(true);
			} else if (msg == "Fail"){
				fail("Login or password is incorrect");
			} else {
				console.log(msg);
			}	
		  });
	};

	var loginState = function(){
		login.val("");
		pass.val("");
		pass2.attr("hidden","true");
		first_name.attr("hidden","true");
		last_name.attr("hidden","true");
		type.val("LOGIN");
		failMsg.html("");
		loginButton.html("LOGIN");
		loginButton.off("click");
		loginButton.on("click", loginEvent);
	};

	var registerState = function(){
		login.val("");
		pass.val("");
		pass2.val("");
		first_name.val("");
		last_name.val("");
		pass2.removeAttr("hidden");
		first_name.removeAttr("hidden");
		last_name.removeAttr("hidden");
		type.val("REGISTER");
		loginButton.html("REGISTER");
		loginButton.off("click");
		loginButton.on("click", registerEvent);
		failMsg.html("");		
	};

	var change = function(){
		var attr = pass2.attr("hidden");
		if (typeof attr !== typeof undefined && attr !== false) registerState();
		else loginState();
	};

	regLink.click(change);
	loginButton.on("click", loginEvent);

	$('.login-text').click(listener);
	blank.click(listener);
});