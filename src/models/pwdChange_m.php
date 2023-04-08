<?php
session_start();
require_once('src/init.php');
ifNoSessionLogin();

function pwdChange(){
    if(isset($_POST['current']) && isset($_POST['new'])){
        $current = $_POST['current'];
        $new = password_hash($_POST['new'], PASSWORD_DEFAULT);
        $db = dbConnect();
        $req = $db->prepare("SELECT password FROM users WHERE id = ?");
        $req->execute(array($_SESSION['id']));
        $row = $req->fetch();
        if(password_verify($current, $row['password'])){
            $req = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            $result = $req->execute(array($new, $_SESSION['id']));
            if($result){
                return '<p class="success">Password changed !</p>';
            }else{
                return '<p class="error">An error has occurred</p>';
            }
        }else{
            return '<p class="error">Wrong current password</p>';
        }
    }else{
        return false;
    }
}