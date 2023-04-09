<?php
require_once('src/models/home_m.php');
createPage();
$pages = getPages();
$notifications = getNotifications();
$tasks = null;
if(isset($_GET['page'])){
    createTasks($_GET['page']);
    $tasks=getTasks($_GET['page']);
    $options = getOptions($_GET['page']);
}
require_once('views/home.php');