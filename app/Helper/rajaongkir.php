<?php

if( !function_exists('province')){
	function province() {
		$uri = "https://pro.rajaongkir.com/api/province";
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}

if( !function_exists('allcity')){
	function allcity($province_id){
		
		$uri = "https://pro.rajaongkir.com/api/city?province=".$province_id;
		
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}
if( !function_exists('city')){
	function city($id=null){
		if($id < 1){
			$uri = "https://pro.rajaongkir.com/api/city";
		}else{
			$uri = "https://pro.rajaongkir.com/api/city?id=".$id;
		}
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}
if( !function_exists('kecamatan')){
	function kecamatan($city_id=null){
		
		$uri = "https://pro.rajaongkir.com/api/subdistrict?city=".$city_id;
		
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}

if( !function_exists('showAlamat')){
	function showAlamat($city_id, $kecamatan_id){
		
		$uri = "https://pro.rajaongkir.com/api/subdistrict?city=".$city_id.'&id='.$kecamatan_id;
		
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => $uri,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}
if(!function_exists('cost')){
	 function cost($origin,$destination,$weight,$courier){
		$curl = curl_init();

		 curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => 'originType=subdistrict&origin='.$origin.'&destinationType=subdistrict&destination='.$destination.'&weight='.$weight.'&courier='.$courier,
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}




if( !function_exists('waybill')){
	function waybill($resi, $eks){
		
		$uri = "https://pro.rajaongkir.com/api/waybill";

		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $uri,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "waybill='.$resi.'&courier='.$eks.'",
		CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: 87b64ed6c63f0b7b591af87aabf2f6ef"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}
}