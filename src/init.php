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

function ifNotSessionExit(){
    if(!isset($_SESSION['user'])){
        return true;
    }
    else{
        header('Location: ?login');
        return false;
    }
}