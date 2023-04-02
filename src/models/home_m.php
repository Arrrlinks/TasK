<?php
require_once('src/init.php');
function createPage(){
    if (isset($_POST['pageName'])) {
        $title = $_POST['pageName'];
        if(!empty($title) ) {
            $db = dbConnect();
            $addPage = $db->prepare('INSERT INTO pages (title) VALUES (?)');
            $addPage->execute(array($title));
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
    $db = dbConnect();
    $getPages = $db->prepare('SELECT * FROM pages');
    $getPages->execute();
    return $getPages->fetchAll();
}