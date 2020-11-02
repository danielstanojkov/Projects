<?php 
 
$files = ['DB', 'Session', 'Redirect', 'Interfaces', 'Admin', 'Question'];

foreach($files as $file){
    $path = "classes/$file.php";
    require_once $path;
}