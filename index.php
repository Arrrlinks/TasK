<?php
if(isset($_GET['login'])){
    require_once('src/controllers/login_c.php');
}
elseif(isset($_GET['register'])){
    require_once('src/controllers/register_c.php');
}
elseif(isset($_GET['logout'])){
    require_once('src/controllers/logout_c.php');
}
elseif(isset($_GET['account'])){
    require_once('src/controllers/account_c.php');
}
elseif(isset($_GET['pwd'])){
    require_once('src/controllers/pwdChange_c.php');
}
elseif (isset($_GET['settings'])) {
    require_once('src/controllers/settings_c.php');
}
elseif (isset($_GET['users'])) {
    require_once('src/controllers/users_c.php');
}
elseif (isset($_GET['notifications'])) {
    require_once('src/controllers/notifications_c.php');
}
else{
    require_once('src/controllers/home_c.php');
}