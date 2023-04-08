<?php
if(isset($_POST['idNotification'])) {
    $idNotification = $_POST['idNotification'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('SELECT idUser,idPage FROM notifications WHERE id = ?');
    $req->execute(array($idNotification));
    $data = $req->fetch();
    if(isset($_POST['decline'])) {
        $req = $db->prepare('DELETE FROM sharedPages WHERE idUser = ? AND idPage = ?');
    } else {
        $req = $db->prepare('UPDATE sharedPages SET isAccepted = 1 WHERE idUser = ? AND idPage = ?');
    }
    $req->execute(array($data['idUser'],$data['idPage']));
    $req = $db->prepare('DELETE FROM notifications WHERE id = ?');
    $req->execute(array($idNotification));
}