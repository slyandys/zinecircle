<?php
//�Ż�����ת���ӿڲ�֪��ԭ��ȡ����
//�����õ��ǹȸ����ת���ӿ�
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