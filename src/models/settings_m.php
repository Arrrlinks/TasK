<?php

require_once('src/init.php');
function getOptions($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM options WHERE idPage = ?');
    $req->execute(array($idPage));
    return $req->fetchAll();
}

function createOption($idPage) {
    if(isset($_POST['option'])) {
        $db = dbConnect();
        $req = $db->prepare('INSERT INTO options (title, idPage) VALUES (?, ?)');
        $req->execute(array($_POST['option'], $idPage));
    }
    if(isset($_POST['modify'])) {
        $db = dbConnect();
        $req = $db->prepare('UPDATE options SET title = ? WHERE id = ?');
        $req->execute(array($_POST['modify'], $_POST['id']));
    }
}

function getPage($idPage) {
    $db = dbConnect();
    $req = $db->prepare('SELECT * FROM pages WHERE id = ?');
    $req->execute(array($idPage));
    return $req->fetch();
}