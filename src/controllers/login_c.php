<?php
require_once('src/models/login_m.php');
$isError = login();
require_once('views/login.php');

