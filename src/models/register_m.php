<?php
require_once('src/init.php');
function createUser(){
    if(isset($_POST['email']) && isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['password']) && isset($_POST['confirm'])){
        $email = $_POST['email'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        if($password == $confirm){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $db = dbConnect();
            $req = $db->prepare('INSERT INTO users (email, firstName, lastName, password) VALUES (:email, :Fname, :Lname, :password)');
            $req->execute(array(
                'email' => $email,
                'Fname' => $Fname,
                'Lname' => $Lname,
                'password' => $password
            ));
            $req = $db->prepare('SELECT id FROM users WHERE email = :email');
            $req->execute(array(
                'email' => $email
            ));
            $result = $req->fetch();

            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $email;
            $_SESSION['Fname'] = $Fname;
            $_SESSION['Lname'] = $Lname;
            header('Location: ?');
        }
        else{
            return '<p class="error">passwords do not match</p>';
        }
    }
}