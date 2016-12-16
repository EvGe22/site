$(document).ready(function () {

	var $modal = $(".modal");
	var $fn_input = $modal.find("#fn-input");
	var $ln_input = $modal.find("#ln-input");
	var $login_input = $modal.find("#login-input");
	var $pass_input = $modal.find("#pass-input");
	var $id_input = $modal.find("#id-input");
	var $type_input = $modal.find("#type-input");
	var $button_input = $modal.find("button");
	var tr;

	var editListener = function(event){
		tr = $(event.target).closest("tr").children();

		console.log(tr);
		$id_input.val($(tr[0]).html());
		$login_input.val($(tr[1]).html());
		$fn_input.val($(tr[2]).html());
		$ln_input.val($(tr[3]).html());
		$type_input.val("EDIT_USER");
		$button_input.html("Edit user");
		
		$pass_input.hide();
		$pass_input.removeAttr('required');

		$modal.toggle();
	};

	var deleteListener = function(event){
		console.log("Delete clicked");
		var $del = $(event.target).closest("tr")
		tr = $del.children();
		$.ajax({
				  method: "POST",
				  url: "control/user_CRUD.php",
				  data: {type: "DEL_USER" , id: $(tr[0]).html()}
				})
				  .done(function( msg ) {
				    if (msg=="Success") $del.remove();
				  });

	};

	var openFormListener = function () {
		$login_input.val("");
		$fn_input.val("");
		$ln_input.val("");
		$button_input.html("Add user");
		$type_input.val("ADD_USER");

		$pass_input.show();
		$pass_input.attr('required','required');

		$modal.toggle();
	};

	var buttonListener = function(event){
		event.preventDefault();
		switch($type_input.val()){
			case "ADD_USER":
				//$modal.find("form").validate();
				$.ajax({
				  method: "POST",
				  url: "control/user_CRUD.php",
				  data: {type: "ADD_USER" , login: $login_input.val(), 
				  	password: $pass_input.val(), first_name: $fn_input.val(), 
				  	last_name: $ln_input.val()}
				})
				  .done(function( msg ) {
				    console.log( "ADD_USER \n" + msg );
				    addUser(msg);
				    $modal.toggle();
				  });
				break;
			case "EDIT_USER":
				$.ajax({
				  method: "POST",
				  url: "control/user_CRUD.php",
				  data: {type: "EDIT_USER" , login: $login_input.val(), 
				  	id: $id_input.val(), first_name: $fn_input.val(), 
				  	last_name: $ln_input.val()}
				})
				  .done(function( msg ) {
				    console.log( "EDIT_USER" + msg );
				    $modal.toggle();
				    editUser();
				  });
				break;
			default:
				console.log("TYPE INPUT IS BROKEN!");
		}
	};

	var addUser = function(string){
		var $table = $("table");
		var $tr = $("<tr></tr>");
		var $tmp;

		$tmp = $("<th></th>").html(string);
		$tr.append($tmp);
		$tmp = $("<th></th>").html($login_input.val());
		$tr.append($tmp);
		$tmp = $("<th></th>").html($fn_input.val());
		$tr.append($tmp);
		$tmp = $("<th></th>").html($ln_input.val());
		$tr.append($tmp);
		$tmp = $("<th></th>");
		var $tmpImg = $("<img class=\"table-button edit\" src=\"assets/img/edit.svg\"/>");
		$tmpImg.click(editListener);
		var $tmpSpan = $("<span class=\"table-button delete\">X</span>");
		$tmpSpan.click(deleteListener);
		$tmp.append($tmpImg, $tmpSpan);
		$tr.append($tmp);

		$table.append($tr);
	};

	var editUser = function(){
		$(tr[1]).html($login_input.val());
		$(tr[2]).html($fn_input.val());
		$(tr[3]).html($ln_input.val());
	};
	
	$(window).click(function(event){	
		if ($(event.target).attr('class') == $modal.attr('class')) {
			$modal.toggle();
			//console.log(event);
		}
	});

	($modal.find("#close-button")).click(function(){
		$modal.toggle();
	});

	$(".edit").click(editListener);

	$(".delete").click(deleteListener);

	$button_input.click(buttonListener);

	$("#open-form").click(openFormListener);

});		