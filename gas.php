<?php
function getGas()
{
	//data source
	$link = "http://www.ottawagasprices.com/";
	
	//locate
	$html = file_get_contents($link);
	//echo $html;
	$doc = new DOMDocument();
	$doc->loadHTML($html);
	//echo $doc->saveHTML();
	$xpath = new DOMXPath($doc);
	//$elements = $xpath->query("//*[@id]");
	//echo $elements;
	//$tables = $doc->getElementsByTagName('table');
	$nodes  = $xpath->query("//table[@class='SideAvg']/tr/td");
	//print_r($nodes);
	//var_dump($nodes->item(1)->nodeValue);
	return $nodes->item(1)->nodeValue;
}

//Call
$_G['Gas'] = getGas();
?>