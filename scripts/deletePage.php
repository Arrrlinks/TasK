<?php
if(isset($_POST['id'])){
    $idPage = $_POST['id'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM pages WHERE id = ?');
    $req->execute(array($idPage));
    return 'Page deleted';
}