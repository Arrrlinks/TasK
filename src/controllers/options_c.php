<?php
require_once('src/models/options_m.php');
createOption($_GET['page']);
$options = getOptions($_GET['page']);
require_once('views/options.php');