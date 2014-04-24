<?php

$errors = array();  	// array to hold validation errors
$data = array(); 		// array to pass back data

// validate the variables ======================================================
	if (empty($_POST['name'])){
		$errors['name'] = 'Name is required.';
	}

	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	if (preg_match($regex, $_POST['email'])) {
		
	}
	else{
		$errors['email'] = 'Invalid Email.';
	}

	if (empty($_POST['message'])){
		$errors['message'] = 'Message is required.';
	}

// return a response ===========================================================

	// response if there are errors
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors, return a message
		$data['success'] = true;
		$data['errors'] = false;
		$data['message'] = 'Message Sent!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);