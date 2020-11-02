<?php
require_once 'vendor/autoload.php';
Millionaire\Session::start();

Millionaire\Session::end();
Millionaire\Redirect::To('index.php');

