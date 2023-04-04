<?php
session_start();
require_once('src/init.php');
function createPage(){
    if (isset($_POST['pageName'])) {
        $title = $_POST['pageName'];
        if(!empty($title) ) {
            $db = dbConnect();
            $addPage = $db->prepare('INSERT INTO pages (title,idOwner) VALUES (?,?)');
            $addPage->execute(array($title,$_SESSION['id']));
            $result = $addPage->fetch();
            if($result) {
                return true;
            } else {
                return false;
            }
        }
    }
}

function getPages(){
    if(isset($_SESSION['id'])) {
        $db = dbConnect();
        $getPages = $db->prepare('SELECT * FROM pages WHERE idOwner = ?');
        $getPages->execute(array($_SESSION['id']));
        return $getPages->fetchAll();
    }
    else {
        return null;
    }
}

if(isset($_GET['page'])){
    $db = dbConnect();
    $getPage = $db->prepare('SELECT * FROM pages WHERE id = ?');
    $getPage->execute(array($_GET['page']));
    $page = $getPage->fetchAll();
    if(!$page[0]['idOwner'] == $_SESSION['id']){
        header('Location: index.php');
    }
}