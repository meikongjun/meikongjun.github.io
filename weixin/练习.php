<?php 
	function httpGet($url){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
	$url = "url";
	httpGet($url);

	function httpPost($url,$data){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST,true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}
	$url = "url";
	$data = '{
		"openid":"url",
		"remark":"pagnzi"
	}';
	httpPost($url,$data);



 ?>