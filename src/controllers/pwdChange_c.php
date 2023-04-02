<?php
require_once('src/models/pwdChange_m.php');
$isChanged = pwdChange();
require_once('views/pwdChange.php');