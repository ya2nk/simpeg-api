<?php
namespace App\Libraries;

use Illuminate\Support\Facades\Http;

class ApiSimpeg
{
	function login()
	{
		$user = config('api-url.username');
		$pass = config('api-url.password');
		
		$response = Http::withBasicAuth($user,$pass)
			->withHeaders(['Origin' => 'http://localhost:20000'])
			->asForm()
			->post(config('api-url.login'),[
				'client_id' => 'kerincitr',
				'grant_type' => 'client_credentials'
		]); 
		
		
		
		if ($response->ok()) {
			$body = json_decode($response->body());
			config(['api-url.token' => $body->access_token]);
			
		}
		
	}
	
	function get($url,$params = array())
	{
		$response = Http::withToken(config('api-url.token'))
			->withHeaders(['Origin' => 'http://localhost:20000','Content-Type' => 'application/x-www-form-urlencoded'])
			->get(config('api-url.url').$url,$params);

		return $response->body();
	}
}