<?php
function dbConnect() {
    return new PDO('mysql:host=92.222.10.61;dbname=TasK;charset=utf8', 'root', '123456789');
}

function ifSessionExit(){
    if(isset($_SESSION['user'])){
        return true;
    }
    else{
        header('Location: ?');
        return false;
    }
}

function ifNoSessionLogin(){
    if(!isset($_SESSION['user'])){
        return true;
    }
    else{
        header('Location: ?login');
        return false;
    }
}

function isPageOwner($id,$page){
    $db = dbConnect();
    $req = $db->prepare('SELECT idOwner FROM pages WHERE idOwner = ? AND id = ?');
    $req->execute(array($id,$page));
    $data = $req->fetch();
    if($data){
        return true;
    }
    else{
        return false;
    }
}