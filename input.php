<html>

<head>
	<title>Foundation Programming Task</title>
	<script src="main.js"></script>
</head>

<body>
	<form action="" method="POST" onsubmit="return formCheck(this)">
		<div class="form-section-container">
			<span class="form-text">First Name</span><input required type="text" name="fn" class="form-input" data-limit="20" data-allow="^[a-z']+$" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="fn-error"></span>
		</div>
		<div class="form-section-container">
			<span class="form-text">Last Name</span><input required type="text" name="ln" class="form-input" data-limit="30" data-allow="^[a-z']+$" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="ln-error"></span>
		</div> 
		<div class="form-section-container">
			<span class="form-text">Street Address</span><input required type="text" name="street" class="form-input" data-limit="50" data-allow="^[\sa-z0-9]+$" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="street-error"></span>
		</div>
		<div class="form-section-container">
			<span class="form-text">Suburb</span><input required type="text" name="suburb" class="form-input" data-limit="15" data-allow="^[a-z']+$" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="suburb-error"></span>
		</div>
		<div class="form-section-container">
			<span class="form-text">State</span>
			<select required name="state" id="" class="form-select">

				<option value="nsw">NSW</option>
				<option value="qld">QLD</option>
				<option value="vic">VIC</option>
				<option value="act">ACT</option>
				<option value="nt">NT</option>
				<option value="wa">WA</option>
				<option value="sa">SA</option>
				<option value="tas">TAS</option>
			</select>
		</div>
		<div class="form-section-container">
			<span class="form-text">Postal Code</span><input required type="text" name="postal" class="form-input" data-limit="4" data-allow="^[0-9]+$" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="postal-error"></span>
		</div>
		<div class="form-section-container">
			<span class="form-text">Telephone Number</span><input required type="tel" name="phone" class="form-input" onblur="checkPhoneInput(this)" onchange="checkPhoneInput(this)">
			<span class="form-error" id="phone-error"></span>
		</div>
		<div class="form-section-container">
			<span class="form-text">Email</span><input required type="email" name="email" class="form-input" onblur="checkEmailInput(this)" onchange="checkEmailInput(this)">
			<span class="form-error" id="email-error"></span>
		</div>
		<input type="submit" text="Register">
	</form>
</body>

<html>