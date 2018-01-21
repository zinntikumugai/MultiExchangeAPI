<?php
require_once __DIR__ .'/BaseModel.php';

/**
 * Zaif.jp
 */
class Zaif extends BaseModel {

    const NAME = 'Zaif';
    const APIVER = '1.1.1';
    const SYMBOL = '_';
    const BASEURL = 'https://api.zaif.jp/api/1/';

    private static function pub($end, $prm) {
        $url = self::BASEURL .$end .'/' .$prm;
        var_dump($url);
        return yield Util::get($url);
    }

    public function makeMarket($fast, $second) {
        return $fast .self::SYMBOL .$second;
    }

    public static function pair($marketname = 'all') {
        $data = yield self::pub('currency_pairs', $marketname);
        return $data;
    }

    public static function allPair() {
        $data = yield self::pub('currency_pairs', 'all');
        return $data;
    }

    public static function curr($currency) {
        $data = yield self::pub('currencies', $currency);
        return $data;
    }

    public static function allCurr() {
        $data = yield self::pub('currencies', 'all');
        return $data;
    }

    public static function lastprice($marketname = 'btc_jpy') {
        $data = yield self::pub('last_prce', $marketname)
        //return $data->last_prce;
        return $data;
    }

    public static function ticker($marketname = 'btc_jpy') {
        $data = yield self::pub('ticker', $marketname);
        return $data;
    }

    public static function trades($marketname = 'btc_jpy') {
        $data = yield self::pub('trades', $marketname);
        return $data;
    }

    public static function depth($marketname = 'btc_jpy') {
        $data = yield self::pub('depth', $marketname);
        return $data;
    }
}

?>
