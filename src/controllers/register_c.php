<?php
require_once('src/models/register_m.php');
$isCreated=createUser();
require_once('views/register.php');