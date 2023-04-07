<?php
if(isset($_POST['title']) && isset($_POST['page'])){
    $title = $_POST['title'];
    $page = $_POST['page'];
    require_once('../src/init.php');
    $db= dbConnect();
    $req = $db->prepare('UPDATE pages SET title = :title WHERE id = :id');
    $req->execute(array(
        'title' => $title,
        'id' => $page
    ));
}