<?php
$cxn = new mysqli($_ENV['DB_HOST'],$_ENV['DB_USER'],$_ENV['DB_PASS'],$_ENV['DB_NAME']);
if($cxn->connect_error) {
    echo "Connection Error";
}
?>
