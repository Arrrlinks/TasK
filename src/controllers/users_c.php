<?php
require_once('src/models/users_m.php');
$page = $_GET['page'];
$created = createUser($page);
$admin = getPageAdmin($page);
$addedUsers = getAddedUsers($page);
$waitingUsers = getWaitingUsers($page);
require_once('views/users.php');