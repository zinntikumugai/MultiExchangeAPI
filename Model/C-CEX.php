<?php
require_once __DIR__ .'/BaseModel.php';

/**
 * Zaif.jp
 */
class CCEX extends BaseModel {

    const NAME = 'C-CEX';
    const APIVER = '';
    const SYMBOL = '-';
    const BASEURL = 'https://c-cex.com/t/';

    private static function pub($path, $prm = null) {
        if(isset($prm))
            $url = self::BASEURL .'api_pub.html?' .http_build_query($prm);
        else
            $url = self::BASEURL . $path . ".json";
        var_dump($url);
        return yield Util::get($url);
    }

        public static function makeMarket($fast, $second) {
            return $fast .self::SYMBOL .$second;
        }

    public static function marketTicker($fast = 'usd', $second = 'btc') {
        echo self::makeMarket($fast,$second);
        $data = yield self::pub(self::makeMarket($fast,$second));
        return $data;
    }

    public static function allPairs() {
        $data = yield self::pub('pairs');
        return $data;
    }

    public static function prices() {
        $data = yield self::pub('prices');
        return $data;
    }

    public static function coinnames() {
        $data = yield self::pub('coinnames');
        return $data;
    }

    public static function volume($market = 'btc') {
        $data = yield self::pub('volume_' .$market);
        return $data;
    }

    public static function getMarkets() {
        $data = yield self::pub('', array('a' => 'getmarkets'));
        return $data;
    }

    public static function getOrderBook($marketname = 'btc-usd', $type ='buy', $depth = 50) {
        $data = yield self::pub('', array('a' => 'getorderbook','market'=>$marketname, 'type' => $type, 'depth'=>$depth));
        return $data;
    }

    public static function getFullOrderBook($depth= 50) {
        $data = yield self::pub('', array('a' => 'getfullorderbook', 'depth'=> $depth));
        return $data;
    }

    public static function getMarketSummaries() {
        $data = yield self::pub('', array('a' => 'getmarketsummaries'));
        return $data;
    }

    public static function getMarketHistory($market='btc-usd', $count = 2) {
        $data = yield self::pub('', array('a' => 'getmarkethistory', 'market'=>$marketname, 'count'=>$count));
        return $data;
    }

    public static function getFullMarketHistory($count = 50) {
        $data = yield self::pub('', array('a'=> 'getfullmarkethistory', 'count'=>$count));
        return $data;
    }

    public static function getBalanceDistribution($curr = 'grc')  {
        $data = yield self::pub('', array('a'=> 'getbalancedistribution', 'currencyname'=>$curr));
        return $data;
    }
}

?>
