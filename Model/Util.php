<?php

class Util {

    public static function curlInitWith($url, $options = []) {
        $ch = curl_init();
        $options = array_replace([
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
		], $options);
		curl_setopt_array($ch, $options);
		return $ch;
    }

    public static function nowtime($format = 'Y-m-d H:i:s', $timezone = 'Asia/Tokyo') {
        $date = new DateTime('', new DateTimeZone($timezone));
        return $date->format($format);
    }

    public static function get($url) {
        $json = yield self::curlInitWith($url);
        return json_decode($json);
    }

    public static function check($patan = '', $data = '') {
        return (stripos($data, $patan) !== false )? true:false;
    }
}

?>
