<?php
include_once("../Shopping_Cart/functions/db_functions.php");
session_destroy();
header('Location:index.php');
?>