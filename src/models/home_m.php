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
            $addOptions = $db->prepare('INSERT INTO options (title,idPage) VALUES (?,?)');
            $idPage = $db->lastInsertId();
            $addOptions->execute(array('To do', $idPage));
            $addOptions->execute(array('In progress', $idPage));
            $addOptions->execute(array('Done', $idPage));
            header('Location: ?page='.$idPage);
        }
    }
}

function getPages(){
    if(isset($_SESSION['id'])) {
        $db = dbConnect();
        $getPages = $db->prepare('SELECT pages.id,pages.idOwner,pages.title FROM pages LEFT JOIN sharedPages ON pages.id = sharedPages.idPage WHERE pages.idOwner = ? OR (sharedPages.idUser = ? AND sharedPages.isAccepted = 1)');
        $getPages->execute(array($_SESSION['id'],$_SESSION['id']));
        return $getPages->fetchAll();
    }
    else {
        return null;
    }
}

if(isset($_GET['page'])){
    $db = dbConnect();
    $getPage = $db->prepare('SELECT idOwner,sharedPages.idUser FROM pages LEFT JOIN sharedPages ON pages.id = sharedPages.idPage WHERE pages.id = ? AND (pages.idOwner = ? OR (sharedPages.idUser = ? AND sharedPages.isAccepted = 1))');
    $getPage->execute(array($_GET['page'],$_SESSION['id'],$_SESSION['id']));
    $page = $getPage->fetchAll();
    if(!$page) {
        header('Location: ?');
    }
}

function createTasks($pageID)
{
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $db = dbConnect();
        $options = getOptions($pageID);
        if ($options!=null) {
            $idOption = $options[0]['id'];
        }
        else {
            $idOption = null;
        }
        $addTask = $db->prepare('INSERT INTO tasks (title,description,idPage,selectedOption) VALUES (?,?,?,?)');
        $addTask->execute(array($title, $description, $pageID, $idOption));
    }
}

function getTasks($pageID)
{
    $db = dbConnect();
    $getTasks = $db->prepare('SELECT * FROM tasks WHERE idPage = ?');
    $getTasks->execute(array($pageID));
    return $getTasks->fetchAll();
}

function getOptions($pageID)
{
    $db = dbConnect();
    $getOptions = $db->prepare('SELECT * FROM options WHERE idPage = ?');
    $getOptions->execute(array($pageID));
    return $getOptions->fetchAll();

}

function getNotifications() {
    if(isset($_SESSION['id'])) {
        $db = dbConnect();
        $req = $db->prepare('SELECT * FROM notifications WHERE idUser = ?');
        $req->execute(array($_SESSION['id']));
        if($req->fetchAll()) {
            return true;
        }
        else {
            return false;
        }
    }
}


function isOwner($pageID) {
    $db = dbConnect();
    $req = $db->prepare('SELECT idOwner FROM pages WHERE id = ?');
    $req->execute(array($pageID));
    $owner = $req->fetch();
    if($owner['idOwner'] == $_SESSION['id']) {
        return true;
    }
    else {
        return false;
    }
}