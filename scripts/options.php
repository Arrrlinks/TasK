<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
    $id = $_POST['id'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM options WHERE id = ?');
    $req->execute(array($id));
}