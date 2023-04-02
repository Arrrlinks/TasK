<?php
require_once('src/models/home_m.php');
$newPage = createPage();
$pages = getPages();
require_once('views/home.php');