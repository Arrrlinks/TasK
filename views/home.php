<?php $title = "TasK"; ?>
<?php $css = "home.css"; ?>
<?php ob_start(); ?>
<div class="homePage">
    <div class="login">
        <div class="loginTitle">
            <?php if(isset($_SESSION['Lname'])) { ?>
                <a href="?logout">
                    <ion-icon name="log-out-outline"></ion-icon><span>Logout</span>
                </a>
            <?php } else { ?>
            <a href="?login">
                <ion-icon name="person-circle-outline"></ion-icon><span>Login</span>
            </a>
            <?php } ?>
        </div>
    </div>
    <div class="title">
        <span class="title1">Tas</span><span class="title2">K</span>
    </div>
    <div class="pagesDisplay" id="pagesDisplay">
        <div id="addPage" onclick="addPage()"><ion-icon name="add-outline"></ion-icon></div>
        <?php foreach($pages as $page) { ?>
            <div class="page" onclick="window.location.href='index.php?page=<?= $page['id'] ?>'">
                <div class="pageName"><?= $page['title'] ?></div>
            </div>
        <?php } ?>
        <div></div>
    </div>
</div>

<script src="../scripts/addPage.js"></script>

<?php  if($newPage) { ?>
    <script>successAlert()</script>
<?php } elseif($newPage!=null) { ?>
    <script>errorAlert()</script>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
