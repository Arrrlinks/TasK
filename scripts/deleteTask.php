<?php
if(isset($_POST['id'])){
    $id=$_POST['id'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM tasks WHERE id = ?');
    $req->execute(array($id));
}