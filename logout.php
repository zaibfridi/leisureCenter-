<?php
session_start();
session_destroy();
include_once ('core/config.php');
header("Location: ".base_url."");
 ?>