<?php 

namespace Millionaire;

class Session {
    public static function start(){
        session_start();
    }

    public static function end(){
        session_destroy();
    }
}