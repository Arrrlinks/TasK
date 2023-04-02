<?php

require_once('src/init.php');
function login()
{
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db = dbConnect();
        $req = $db->prepare('SELECT id,email,firstName,lastName,password FROM users WHERE email = :email');
        $req->execute(array(
            'email' => $email
        ));
        $result = $req->fetch();
        if (password_verify($password, $result['password'])) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $email;
            $_SESSION['Fname'] = $result['firstName'];
            $_SESSION['Lname'] = $result['lastName'];
            header('Location: index.php');
        }else{
            return '<p class="error">Wrong email or password</p>';
        }
    }
}