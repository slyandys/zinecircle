<?php
function getGas()
{
	//data from GasBuddy.com
	$link = "http://www.gasbuddy.com/GB_Price_List.aspx?cntry=CAN#can_cities";

	$html = file_get_contents($link);
	$doc = new DOMDocument();
	$doc->loadHTML($html);
	$xpath = new DOMXPath($doc);
	$tables = $doc->getElementsByTagName('table')->item(2);
	
	//Ottawa
	$nodes  = $xpath->query('.//tbody/tr/td/a', $tables);
	//var_dump($nodes->item(6)->nodeValue);
	
	//Gas price
	//$nodes  = $xpath->query('.//tbody[1]/tr[7]/td', $tables->item(2));
	$nodes  = $xpath->query('.//tr/td/a[contains(text(),"Ottawa")]', $tables);
	//var_dump($nodes->item(1)->nodeValue);
	print $nodes->item(1)->nodeValue;
	return $nodes->item(1)->nodeValue;
}
//Call
$_G['Gas'] = getGas();
?>