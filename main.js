function checkFormInput(e){
	var pattern = document.activeElement.getAttribute("data-allow");
	var limit = document.activeElement.getAttribute("data-limit");
	var regex = new RegExp(pattern, "i");
	var input = document.activeElement.value;

	var errorPlace = document.getElementById(document.activeElement.getAttribute("name") + "-error");
	console.log(input.length + " " + limit);


	// Set first char to be uppercase
	if(input.length === 1){
		document.activeElement.value = input.toUpperCase();
	}

	var valid = regex.test(input);
	
	if(input.length === 0){
		errorPlace.innerHTML = "Required, cannot be blank";
	}
	else if (input.length > limit){
		document.activeElement.value = input.substring(0, input.length - 1);
		errorPlace.innerHTML = "Over limit. You can only type " + limit + " characters";
	}
	else if (valid){
		errorPlace.innerHTML = "";
	}
	else{
		errorPlace.innerHTML = "Wrong Input";
	}
}
