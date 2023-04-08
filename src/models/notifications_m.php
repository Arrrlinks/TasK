<?php
session_start();
require_once('src/init.php');
function getNotifications()
{
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $db = dbConnect();
        $req = $db->prepare('SELECT id,idUser FROM notifications WHERE idUser = ?');
        $req->execute(array($id));
        return $req->fetchAll();
    }
    else{
        header('Location: ?');
    }
}

function getSender($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT firstName, lastName FROM users INNER JOIN notifications ON users.id = notifications.idSender WHERE notifications.idUser = ?');
    $req->execute(array($id));
    return $req->fetchAll();
}

function getPage($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT title FROM pages INNER JOIN notifications ON pages.id = notifications.idPage WHERE notifications.idUser = ?');
    $req->execute(array($id));
    return $req->fetchAll();
}