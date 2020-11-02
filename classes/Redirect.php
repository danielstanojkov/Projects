<?php 

namespace Millionaire;

class Redirect {
    public static function To($location){
        header("Location: $location");
        die();
    }

    public static function Refresh($param = ''){
        self::To($_SERVER['REQUEST_URI'] . $param);
    }
}