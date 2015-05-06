<?php
//Weather API from OpenWeatherMap.org
function getWeather()
{
	$city="Ottawa"; //set city
	$country="CA"; //set country
	$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en";
	$json=file_get_contents($url);
	$data=json_decode($json,true);
	
	//Examples
	//Get current Temperature in Celsius
	//echo $data['main']['temp']."&#176;C"."<br>";
	//Get weather condition
	//echo $data['weather'][0]['main']."<br>";
	//Get cloud percentage
	//echo $data['clouds']['all']."<br>";
	//Get wind speed
	//echo $data['wind']['speed']."<br>";
	
	return $data['weather'][0]['main']."&nbsp&nbsp".$data['main']['temp']."&#176;C";
}

//Call
$_G['weather'] = getWeather();

?>