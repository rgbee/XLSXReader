<?php

namespace socialist\exel\xls;


/**
* 
*/
class ExelReaderHelper
{
	public static function GetInt4d($data, $pos) {
		$value = ord($data[$pos]) |
				(ord($data[$pos + 1])	<< 8) |
				(ord($data[$pos + 2])   << 16) |
				(ord($data[$pos + 3])   << 24);

		if ($value >= 4294967294) {
			$value =- 2;
		}

		return $value;
	}

	// http://uk.php.net/manual/en/function.getdate.php
	public static function gmgetdate($ts = null){
		$k = array('seconds', 'minutes', 'hours', 'mday', 'wday', 'mon', 'year', 'yday', 'weekday', 'month', 0);

		return(self::array_comb($k, explode(":", gmdate('s:i:G:j:w:n:Y:z:l:F:U', is_null($ts) ? time() : $ts))));
	}

	public static function array_comb($array1, $array2) {
		$out = array();

		foreach ($array1 as $key => $value) {
			$out[$value] = $array2[$key];
		}

		return $out;
	}

	public static function v($data,$pos) {

		return ord($data[$pos]) | ord($data[$pos+1]) << 8;
	}
}