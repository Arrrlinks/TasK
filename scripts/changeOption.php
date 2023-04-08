<?php
if(isset($_POST['idOption']) && isset($_POST['idTask'])){
    $idOption = $_POST['idOption'];
    $idTask = $_POST['idTask'];
    require_once('../src/init.php');
    $db = dbConnect();
    $req = $db->prepare('UPDATE tasks SET selectedOption = ? WHERE id = ?');
    $req->execute(array($idOption,$idTask));
}
else{
    echo 'error';
}