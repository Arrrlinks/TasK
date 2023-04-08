<?php
require_once('src/models/notifications_m.php');
$notifications = getNotifications();
require_once('views/notifications.php');