<?php
if(isset($_POST['id']) && isset($_POST['page'])){
    $id = $_POST['id'];
    $page = $_POST['page'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM sharedPages WHERE idUser = ? AND idPage = ?');
    $req->execute(array($id,$page));
}
else{
    echo 'error';
}