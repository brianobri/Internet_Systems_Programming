$(document).ready(function(){	
	$("[name=phone]").blur(function(){
		function ajaxResultsCallback(data) {
        		var storedvalues = JSON.parse(data);
			$('[name=fname]').val(storedvalues.fname);
			$('[name=mi]').val(storedvalues.mi);
			$('[name=lname]').val(storedvalues.lname);
			$('[name=account]').val(storedvalues.account);
		}

		var phone = document.getElementById("phone").value;
		var ajaxSettings = {type: "GET", url: "getNameAccount.php?phone=" + phone};
		$.ajax(ajaxSettings).done(ajaxResultsCallback);
	});

	$("form").submit(function(){
		if(!$("input[name=phone]").val().match(/^\d{7}$/)){
			alert("Phone needs to have only 7 digits.");
			return false;
		}
		else if(!$("input[name=account]").val().match(/^\d{4}$/)){
			alert("Account needs to have only 4 digits.");
			return false;
		}
		else if($("input[name=account]").val().match(/^0\d{3}$/)){
			alert("Account cannot start with a zero.");
			return false;
		}
		else if(!$("input[name=fname]").val().match(/^[a-zA-Z]+$/)){
			alert("First name needs to have only letters");
			return false;
		}
		else if(!$("input[name=mi]").val().match(/^[A-Z]$/)){
			alert("Middle initial needs to have only have one capital letter.");
			return false;
		}
		else if(!$("input[name=lname]").val().match(/^[a-zA-Z]+$/)){
			alert("Last name needs to have only letters.");
			return false;
		}
	});
	
});



