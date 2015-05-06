<?php
//雅虎汇率转换接口不知何原因取消了
//现在用的是谷歌汇率转换接口
function getExchangeRate($from_Currency,$to_Currency)
{
        $amount = urlencode(1);//$amount
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $url  = "https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
		$data = file_get_contents($url);
		preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
		$converted = preg_replace("/[^0-9.]/", "", $converted[1]);
		return $converted;
}

//Call
$_G['currency'] = getExchangeRate("CAD","CNY");
?>