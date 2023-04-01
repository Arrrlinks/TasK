<?php
if(isset($_GET['login'])){
    require_once('src/controllers/login_c.php');
}
else{
    require_once('src/controllers/home_c.php');
}