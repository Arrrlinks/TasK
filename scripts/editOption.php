<?php
if(isset($_POST['id']) && isset($_POST['value']) && $_POST['option'] == 'edit'){
    $id = $_POST['id'];
    $value = $_POST['value'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('UPDATE options SET title = ? WHERE id = ?');
    $req->execute(array($value, $id));
    echo'ok';
}
elseif (isset($_POST['idPage']) && isset($_POST['value']) && $_POST['option'] == 'option'){
    $id = $_POST['idPage'];
    $value = $_POST['value'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO options (title, idPage) VALUES (?, ?)');
    $req->execute(array($value, $id));
}