<?php
session_start();
require_once('src/init.php');
function getPageAdmin($idPage){
    $db = dbConnect();
    $req = $db->prepare('SELECT idOwner FROM pages WHERE id = ?');
    $req->execute(array($idPage));
    $result = $req->fetch();
    $req = $db->prepare('SELECT lastName, firstName, email FROM users WHERE id = ?');
    $req->execute(array($result['idOwner']));
    return $req->fetch();
}
function getAddedUsers($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT idUser FROM sharedPages WHERE idPage = ? AND isAccepted = 1');
    $req->execute(array($idPage));
    return $req->fetchAll();
}
function getWaitingUsers($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT idUser FROM sharedPages WHERE idPage = ? AND isAccepted = 0');
    $req->execute(array($idPage));
    return $req->fetchAll();
}

function createUser($idPage) {
    if(isset($_POST['user'])) {
        $db = dbConnect();
        $req = $db->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute(array($_POST['user']));
        $idUser = $req->fetch();
        if($idUser) {
            $req = $db->prepare('SELECT idUser FROM sharedPages WHERE idUser = ? AND idPage = ?');
            $req->execute(array($idUser['id'], $idPage));
            $result = $req->fetch();
            if($result) {
                return 'alreadyAdded';
            }
            else {
                $req = $db->prepare('INSERT INTO sharedPages(idUser, idPage) VALUES(?, ?)');
                $req->execute(array($idUser['id'], $idPage));
                $req = $db->prepare('INSERT INTO notifications(idUser,idSender, idPage) VALUES(?,?,?)');
                $req->execute(array($idUser['id'], $_SESSION['id'], $idPage));
            }

        }
        else {
            return 'invalid';
        }
    }
}

function getUser($id)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT firstName, lastName, email FROM users INNER JOIN sharedPages ON users.id = sharedPages.idUser WHERE sharedPages.idUser = ?');
    $req->execute(array($id));
    return $req->fetchAll();
}
