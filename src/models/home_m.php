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
            header('Location: index.php?page='.$idPage);
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

function createTasks($pageID)
{
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $db = dbConnect();
        $addTask = $db->prepare('INSERT INTO tasks (title,description,idPage) VALUES (?,?,?)');
        $addTask->execute(array($title, $description, $pageID));
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