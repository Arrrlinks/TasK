<?php
if(isset($_POST['idPage']) && isset($_POST['idUser'])){
    $idPage = $_POST['idPage'];
    $idUser = $_POST['idUser'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM pages WHERE id = ? AND idOwner = ?');
    $req->execute(array($idPage, $idUser));
    return 'Page deleted';
}
else{
    return 'Error';
}