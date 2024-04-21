<?php
require_once("../Includes/Functions.php");
// require_once("../Includes/Sessions.php");

$_SESSION = array();

session_destroy();

Redirect_to("login.php");
?>
