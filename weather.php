<?php
//Weather API from OpenWeatherMap.org
function getWeather()
{
	$city="Ottawa"; //set city
	$country="CA"; //set country
	//$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en";
	
	$url="http://weather.gc.ca/city/pages/on-118_metric_e.html";
	
	
	$html=file_get_contents($url);
	
	$doc = new DOMDocument();
	$doc->loadHTML($html);
	//echo $doc->saveHTML();
	$xpath = new DOMXPath($doc);
	//$elements = $xpath->query("//*[@id]");
	//echo $elements;
	//$tables = $doc->getElementsByTagName('table');
	$nodes  = $xpath->query("//*[@id='currconditionscontainer']/div[3]/div/div[1]/div/div[2]/p");
	//print_r($nodes);
	//var_dump($nodes->item(0)->nodeValue);
	return $nodes->item(0)->nodeValue;
}
 
//Call
$_G['weather'] = getWeather();

?>