<?php
session_start();
require_once('src/init.php');

ifNotSessionExit();

function getAccount(){
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE email = ?');
    $req->execute([$_SESSION['email']]);
    return $req->fetch();
}