<?php

require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/Util.php';

use mpyw\Co\Co;
use mpyw\Co\CURLException;

/**
 *
 */
class BaseModel {

    const NAME = null;
    const APIVER = null;
    const SYMBOL = '_'; //Defalt Symbol "_"
    const BASEURL = null;

    function __construct($arg = []) {
    }

    /*
    * デバック用、接続先取引場名 <- マーケット
    */
    public static function getAccessEcho($marketName) {
        return self::Name ." <- " .$marketName;
    }
/*
    public function makeMarket($fast, $second) {
        return $fast .self::SYMBOL .$second;
    }
    */

    /*
    * 表示用、桁区切りと小数点以下の不要0の除去
    */
    public static function shapingAmount($amount = 0, $shaping = 3) {
        $amount = number_format($amount, $shaping);
        $amount = preg_replace("/\.?0+$/",'',$amount);
        return $amount;
    }


}


?>
