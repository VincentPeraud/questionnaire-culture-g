<?php

namespace App\Utils;

class IonisUser
{
	public static function checkAuth($login, $pwd)
	{
		$c = curl_init();

		$url = "https://return.epitech.eu/ws/INI/?action=login&auth_login=" . $login . "&auth_password=" . $pwd;

		curl_setopt($c, CURLOPT_HTTPGET, true);
		curl_setopt($c, CURLOPT_URL, $url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_HEADER, false);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);

		$output = curl_exec($c);

		if ($output === false)
			return false;

		$output = parse_ini_string($output, true);

		return ($output["error"]["error"] != "auth_fail");
	}
}