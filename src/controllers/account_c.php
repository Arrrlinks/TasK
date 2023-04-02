<?php
require_once('src/models/account_m.php');
$infos = getAccount();
require_once('views/account.php');