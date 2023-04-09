<?php
require_once('src/models/settings_m.php');
$options = getOptions($_GET['page']);
$page = getPage($_GET['page']);
require_once('views/settings.php');