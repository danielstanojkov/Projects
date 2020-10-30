<?php

$connection = mysqli_connect('localhost', 'root', '', 'employers_db');
if (!$connection) {
    mysqli_error($connection);
}
