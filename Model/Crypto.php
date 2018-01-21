<?php
 /**
 *
 */
class Crypto {
    public $name = null;
    public $exchange = [];

    function __construct($name) {
        $this->name = $name;
    }

    function addExchange($ex = null) {
        if($ex === null)
            return;

        array_push($this->exchange, $ex);
    }
}
 ?>
