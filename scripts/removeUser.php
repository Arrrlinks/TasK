<?php
if(isset($_POST['id']) && isset($_POST['page'])){
    $id = $_POST['id'];
    $page = $_POST['page'];
    require_once("../src/init.php");
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM sharedPages WHERE idUser = :id AND idPage = :page");
    $req->execute(array(
        'id' => $id,
        'page' => $page
    ));
}