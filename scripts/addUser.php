<?php
session_start();
if(isset($_POST['user']) && isset($_POST['page'])) {
    $user = $_POST['user'];
    $page = $_POST['page'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('SELECT id FROM users WHERE email = ?');
    $req->execute(array($user));
    $idUser = $req->fetch();
    if($idUser) {
        $req = $db->prepare('SELECT idUser FROM sharedPages WHERE idUser = ? AND idPage = ?');
        $req->execute(array($idUser['id'], $page));
        $result = $req->fetch();
        if($result) {
            echo 'alreadyAdded';
        }
        else {
            $req = $db->prepare('INSERT INTO sharedPages(idUser, idPage) VALUES(?, ?)');
            $req->execute(array($idUser['id'], $page));
            $req = $db->prepare('INSERT INTO notifications(idUser,idSender, idPage) VALUES(?,?,?)');
            $req->execute(array($idUser['id'], $_SESSION['id'], $page));
            $req = $db->prepare('SELECT id,firstName,lastName,email FROM users WHERE email = ?');
            $req->execute(array($user));
            $result = $req->fetch();
            echo json_encode($result);
        }

    }
    else {
        echo 'invalid';
    }
}