<?php

require dirname(__FILE__) . '/vars.php';

$conn = mysqli_connect( $_ENV['DBSERVER'],  $_ENV['DBUSER'],  $_ENV['DBPASS'] );

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}
