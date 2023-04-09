<?php
session_start();
require_once('src/init.php');

function getOptions($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM options WHERE idPage = ?');
    $req->execute(array($idPage));
    return $req->fetchAll();
}

function getPage($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM pages WHERE id = ?');
    $req->execute(array($idPage));
    return $req->fetch();
}