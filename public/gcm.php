<?php

    $url = 'https://android.googleapis.com/gcm/send';
    
	$headers = array(
		'Authorization: key=AIzaSyCGhzQLXui1xNRx4x3OLQ5xMoG59BxK2P4', 
		'Content-Type: application/json'
	);

   	$id = array('APA91bEJ5dH2SFitPMtAwr5akNI9EAQzvla-o3o1gLrRR730QPWBvmVZRJILuy-wQlCEb25t8S5uhqe-do3TfkaO18TUXrFNz-G4az-r5YUcfJQLvKlzfuW-ihsAzMIwdp_nEqoiqwZP5Okx1eExUlvVmpq0ggxxtiHMVKs3d1JjmLP3ZsclMOI');

    $data = array(
    	'message' => 'test',
    );

	$fields = array(
		'registration_ids' => $id,
		'data' => $data,
	);

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
	if ($result === FALSE) {
		die('Curl failed: ' . curl_error($ch));
	}
	curl_close($ch);

	echo '<pre>';
	var_dump($result);
	echo '</pre>';