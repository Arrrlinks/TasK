<?php
require_once('src/models/settings_m.php');
createOption($_GET['page']);
$options = getOptions($_GET['page']);
$page = getPage($_GET['page']);
require_once('views/settings.php');