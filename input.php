<?php
	$errors = array();

	$input_regexes = array();
	$input_regexes['fn'] = "^[a-z']+$";
	$input_regexes['ln'] = "^[a-z']+$";
	$input_regexes['street'] = "[\sa-z0-9.,]+$";
	$input_regexes['suburb'] = "^[a-z']+$";
	$input_regexes['state'] = "^[a-z]+$";
	$input_regexes['postal'] = "^[0-9]+$";
	$input_regexes['phone'] = "^[0-9]+$";
	$input_regexes['email'] = "^[-!#$%&'*+\/0-9=?A-Z^_a-z{|}~](\.?[-!#$%&'*+\/0-9=?A-Z^_a-z{|}~])*@[a-zA-Z](-?[a-zA-Z0-9])*(\.[a-zA-Z](-?[a-zA-Z0-9])*)+$";

	$input_limits = array();
	$input_limits['fn'] = 20;
	$input_limits['ln'] = 30;
	$input_limits['street'] = 50;
	$input_limits['suburb'] = 15;
	$input_limits['state'] = 3;
	$input_limits['postal'] = 4;
	$input_limits['phone'] = 10;
	$input_limits['email'] = 9999;

	if(isset($_POST['register'])){
		$errors = array();
		$inputs = array();
		$input_names = array();

		$inputs['fn'] = mb_convert_encoding($_POST['fn'], 'UTF-8', 'UTF-8');
		$inputs['ln'] = mb_convert_encoding($_POST['ln'], 'UTF-8', 'UTF-8');
		$inputs['street'] = mb_convert_encoding($_POST['street'], 'UTF-8', 'UTF-8');
		$inputs['suburb'] = mb_convert_encoding($_POST['suburb'], 'UTF-8', 'UTF-8');
		$inputs['state'] = $_POST['state'];
		$inputs['postal'] = mb_convert_encoding($_POST['postal'], 'UTF-8', 'UTF-8');
		$inputs['phone'] = mb_convert_encoding($_POST['phone'], 'UTF-8', 'UTF-8');
		$inputs['email'] = mb_convert_encoding($_POST['email'], 'UTF-8', 'UTF-8');

		$input_names['fn'] = 'First name';
		$input_names['ln'] = 'Last name';
		$input_names['street'] = 'Street address';
		$input_names['suburb'] = 'Suburb';
		$input_names['state'] = 'State';
		$input_names['postal'] = 'Postal code';
		$input_names['phone'] = 'Phone number';
		$input_names['email'] = 'Email';


		foreach($inputs as $input => $input_value){
			if($input_value == ''){
				array_push($errors, $input_names[$input] . ' is empty.');
			}
			else if(!preg_match('/' . $input_regexes[$input] . '/i', $input_value)){
				array_push($errors, $input_names[$input] . ' is invalid.');
			}
			else if(strlen($input_value) > $input_limits[$input]){
				array_push($errors, $input_names[$input] . ' is too long. The limit is ' . $input_limits[$input] . ' characters.');
			}
		}

		$errors = array_filter($errors);

		if (empty($errors)){
			session_start();
			$_SESSION['data'] = $inputs;
			header('Location: register.php');
		}
		else{
			array_unshift($errors, "There are some errors in your form. Please correct it first.");
			array_push($errors, "Please enable Javascript for a more detailed explanation in filling the forms.");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Foundation Programming Task</title>
	<script src="main.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
		if(!empty($errors)){
			echo '<div class="php-error">';
			foreach ($errors as $value){
				echo '<span class="php-error-item">' . $value . '</span>';
			}
			echo '</div>';
		}
	?>
	<!-- put novalidate if no need for html5 checks -->
	<form class="form-section" novalidate action="" method="POST" onsubmit="return formCheck(this)">
		<div class="form-section-container">
			<label class="form-text" for="fn">First Name</label><input required value="<?php echo isset($_POST['register']) ? $inputs['fn'] : ''; ?>" type="text" name="fn" class="form-input" data-limit="20" data-allow="<?php echo $input_regexes['fn'] ?>" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="fn-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="ln">Last Name</label><input required value="<?php echo isset($_POST['register']) ? $inputs['ln'] : ''; ?>" type="text" name="ln" class="form-input" data-limit="30" data-allow="<?php echo $input_regexes['ln'] ?>" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="ln-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="street">Street Address</label><input required type="text" value="<?php echo isset($_POST['register']) ? $inputs['street'] : ''; ?>" name="street" class="form-input" data-limit="50" data-allow="<?php echo $input_regexes['street'] ?>" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="street-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="suburb">Suburb</label><input value="<?php echo isset($_POST['register']) ? $inputs['suburb'] : ''; ?>"  required type="text" name="suburb" class="form-input" data-limit="15" data-allow="<?php echo $input_regexes['suburb'] ?>" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="suburb-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="state">State</label>
			<select required name="state" id="" class="form-select" onblur="checkState(this)" onchange="checkState(this)">
				<option selected value="123">Select</option>
				<option value="NSW">NSW</option>
				<option value="QLD">QLD</option>
				<option value="VIC">VIC</option>
				<option value="ACT">ACT</option>
				<option value="NT">NT</option>
				<option value="WA">WA</option>
				<option value="SA">SA</option>
				<option value="TAS">TAS</option>
			</select>
			<span class="form-error" id="state-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="postal">Postal Code</label><input value="<?php echo isset($_POST['register']) ? $inputs['postal'] : ''; ?>"  required type="text" name="postal" class="form-input" data-limit="4" data-allow="<?php echo $input_regexes['postal'] ?>" onblur="checkFormInput(this)" onchange="checkFormInput(this)">
			<span class="form-error" id="postal-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="tel">Telephone</label><input value="<?php echo isset($_POST['register']) ? $inputs['phone'] : ''; ?>" required type="tel" name="phone" class="form-input" onblur="checkPhoneInput(this)" onchange="checkPhoneInput(this)">
			<span class="form-error" id="phone-error"></span>
		</div>
		<div class="form-section-container">
			<label class="form-text" for="email">Email</label><input value="<?php echo isset($_POST['register']) ? $inputs['email'] : ''; ?>" required type="email" name="email" class="form-input" onblur="checkEmailInput(this)" onchange="checkEmailInput(this)">
			<span class="form-error" id="email-error"></span>
		</div>
		<input type="submit" text="Register" name="register">
	</form>
</body>

<html>