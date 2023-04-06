<?php $title = "TasK"; ?>
<?php $css = "home.css"; ?>
<?php ob_start(); ?>
<div class="homePage" id="homePage">
    <div class="login">
        <?php if (isset($_SESSION['Lname'])) { ?>
            <a href="?account">
                <ion-icon name="person-circle-outline"></ion-icon>
                <span><?= strtoupper($_SESSION['Lname']) . ' ' . ucfirst($_SESSION['Fname']) ?></span>
            </a>
        <?php } else { ?>
            <a href="?login">
                <ion-icon name="person-circle-outline"></ion-icon>
                <span>Login</span>
            </a>
        <?php } ?>
    </div>
    <div id="wholeTitle" class="title" onclick="window.location.href='?'">
        <span class="title1" id="title1">Tas</span><span class="title2" id="title2">K</span>
    </div>
    <div class="pagesDisplay" id="pagesDisplay">
        <?php if (isset($_SESSION['id'])) { ?>
            <div id="addPage" onclick="addPage()">
                <ion-icon name="add-outline"></ion-icon>
            </div>
            <?php foreach ($pages as $page) { ?>
                <div class="page" id="<?= $page['id'] ?>" onclick="window.location.href='?page=<?= $page['id'] ?>'">
                    <div class="pageName"><?= $page['title'] ?></div>
                </div>
            <?php }
        } ?>
        <div></div>
    </div>
</div>
<div class="taskContainer" id="taskContainer">
    <?php if (isset($_GET['page'])) { ?>
        <div class="menu">
            <button onclick="deletePage('<?= $_GET['page'] ?>')"><ion-icon name="trash-outline"></ion-icon></button>
            <button onclick="window.location.href='?options&page=<?= $_GET['page'] ?>'"><ion-icon name="pricetags-outline"></ion-icon></button>
        </div>
        <div class="searchCreateDiv" id="searchCreateDiv">
            <div class="searchBar">
                <form method="get">
                    <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
                    <input type="text" placeholder="Search" name="q" id="searchBar">
                </form>
            </div>
            <div class="createTask">
                <button id="createTaskBtn">Create a TasK</button>
            </div>
        </div>
    <?php } ?>

    <?php if ($tasks != null) {
        foreach ($tasks as $task) { ?>
            <div class="task">
                <h2><?= $task['title'] ?></h2>
                <div class="description">
                    <p> <?= $task['description'] ?> </p>
                </div>
                <div class="select">
                    <select class="tasks-select">
                        <?php
                        foreach ($options as $option) { ?>
                            <option value="<?= $option['id'] ?>" <?= $option['isSelected'] ? 'selected' : '' ?>><?= $option['title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        <?php }
    } ?>

</div>
<script src="../scripts/addPage.js"></script>
<script src="../scripts/deletePage.js"></script>
<script src="../scripts/scroll.js"></script>
<!--script src="../scripts/changeColor.js"></script-->
<script src="../scripts/createTask.js"></script>
<script src="../scripts/currentPage.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
