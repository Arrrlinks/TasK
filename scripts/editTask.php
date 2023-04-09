<?php
if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description'])){
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('UPDATE tasks SET title = ?, description = ? WHERE id = ?');
    $req->execute(array($title, $description, $id));
}