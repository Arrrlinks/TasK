<?php $title = "Account"; ?>
<?php $css = "account.css"; ?>

<?php ob_start(); ?>
<div class="title">
    <a href="?"><span class="title1">Tas</span><span class="title2">k</span></a>
</div>
<div id="account">
    <h1>My Account</h1>
    <p>Email : <?= $infos['email'] ?></p>
    <p>First Name : <?= $infos['firstName'] ?></p>
    <p>Last Name : <?= $infos['lastName'] ?></p>
    <div class="buttonContainer">
        <button onclick="window.location.href='?pwd'">Change password</button>
        <button onclick="window.location.href='?notifications'">Notifications</button>
        <button onclick="window.location.href='?logout'">Logout</button>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
