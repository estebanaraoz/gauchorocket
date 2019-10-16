<?php

session_start();
session_destroy('user');

header("location: login.php");
exit();

 ?>
