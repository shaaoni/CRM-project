<?php

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    echo $uid;

    echo "Hello,  You are  years old.";
} else {
    echo "No data received.";
}
?>
