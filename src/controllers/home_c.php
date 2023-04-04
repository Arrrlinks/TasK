<?php
require_once('src/models/home_m.php');
$newPage = createPage();
$pages = getPages();
$tasks = null;
if(isset($_GET['page'])){
    createTasks($_GET['page']);
    $tasks=getTasks($_GET['page']);
    $options = getOptions($_GET['page']);
}
require_once('views/home.php');