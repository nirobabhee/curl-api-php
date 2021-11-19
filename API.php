<?php
class API
{
	// Properties 
	private $apiUrl;



	function __construct($arg)
	{
		if ($arg) {
			$this->apiUrl = $arg;
		}
	}

	// Methods
	function setter($arg)
	{
		$this->apiUrl = $arg;
	}


	function getter()
	{
		return $this->apiUrl;
	}


	function  getApiData()
	{
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$this->apiUrl);
		// Execute
		$response=curl_exec($ch);
		// Will dump a beauty json <3
		// $response=json_encode($result, true);
		return $response;
		

	}
}
