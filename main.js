function checkFormInput(el){
	var pattern = el.getAttribute("data-allow");
	var limit = el.getAttribute("data-limit");
	var regex = new RegExp(pattern, "i");
	var input = el.value;

	var errorPlace = document.getElementById(el.getAttribute("name") + "-error");

	// Set first char to be uppercase
	el.value = input.charAt(0).toUpperCase() + input.slice(1);

	var valid = regex.test(input);

	if(input.length === 0){
		errorPlace.innerHTML = "Required, cannot be blank";
	}
	else if (limit != 0 && input.length > limit){
		errorPlace.innerHTML = "Over limit. You can only type " + limit + " characters";
	}
	else if (valid){
		errorPlace.innerHTML = "";
	}
	else{
		errorPlace.innerHTML = "Wrong Input";
	}
}

function checkPhoneInput(el){
	var regex = new RegExp("^[0-9]+$", "i");
	var input = el.value;

	var errorPlace = document.getElementById(el.getAttribute("name") + "-error");

	var valid = regex.test(input);

	if(input.length === 0){
		errorPlace.innerHTML = "Required, cannot be blank";
	}
	else if (10 != 0 && input.length > 10){
		errorPlace.innerHTML = "Over limit. You can only type 10 characters";
	}
	else if (valid){
		errorPlace.innerHTML = "";
	}
	else{
		errorPlace.innerHTML = "Wrong Input";
	}
}

function checkEmailInput(el){
	// http://thedailywtf.com/Articles/Validating_Email_Addresses.aspx
	var regex = new RegExp("^[-!#$%&'*+/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&'*+/0-9=?A-Z^_a-z{|}~])*@[a-zA-Z](-?[a-zA-Z0-9])*(\.[a-zA-Z](-?[a-zA-Z0-9])*)+$", "i");
	var input = el.value;
	var valid = regex.test(input);
	var errorPlace = document.getElementById(el.getAttribute("name") + "-error");

	if (valid){
		errorPlace.innerHTML = "";
	}
	else if(input.length === 0){
		errorPlace.innerHTML = "Required, cannot be blank";
	}
	else{
		errorPlace.innerHTML = "Wrong Input";
	}
}

function checkState(el){
	var errorPlace = document.getElementById(el.getAttribute("name") + "-error");
	if(el.options[el.selectedIndex].defaultSelected){
		errorPlace.innerHTML = "Required. You're selecting an invalid value.";
	}
	else{
		errorPlace.innerHTML = "";
	}
}

function formCheck(el){
	var elements = el.querySelectorAll("span.form-error");
	var inputs = el.querySelectorAll("input.form-input, select.form-select");

	// Trigger the validation
	for(var i = 0; i < inputs.length; i++){
		if ("createEvent" in document){
			var e = document.createEvent("HTMLEvents");
			e.initEvent("change", false, true);
			inputs[i].dispatchEvent(e);
		}
		else{
			element.fireEvent("onchange"); // Because IE
		}
	}

	// Check if something's wrong
	var bCheck = true;
	for (var i = 0; i < elements.length; i++){
		if (elements[i].innerHTML != ""){
			bCheck = false;
			break;
		}
	}
	return bCheck;
}