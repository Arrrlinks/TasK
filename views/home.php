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
    <div class="title">
        <span class="title1" id="title1">Tas</span><span class="title2" id="title2">K</span>
    </div>
    <div class="pagesDisplay" id="pagesDisplay">
        <?php if (isset($_SESSION['id'])) { ?>
            <div id="addPage" onclick="addPage()">
                <ion-icon name="add-outline"></ion-icon>
            </div>
            <?php foreach ($pages as $page) { ?>
                <div class="page" onclick="window.location.href='index.php?page=<?= $page['id'] ?>'">
                    <div class="pageName"><?= $page['title'] ?></div>
                </div>
            <?php }
        } ?>
        <div></div>
    </div>
</div>
<div class="taskContainer" id="taskContainer">
    <div class="searchBar">
        <form method="get">
            <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
            <input type="text" placeholder="Search" name="q" id="searchBar">
        </form>
    </div>
    <div class="createTask">
        <button onclick="window.location.href='?createTask&page=<?= $_GET['page'] ?>'">Create a TasK</button>
    </div>

    <div class="task">
        <h2>Titre</h2>
        <div class="description">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus scelerisque volutpat. Nulla molestie
                dolor est, non fringilla leo finibus at. Sed sit amet massa ac ipsum accumsan commodo quis sed odio.
                Donec non leo aliquam, scelerisque eros sit amet, mattis nibh. In imperdiet erat nisl, sed venenatis
                erat euismod at.</p>
        </div>
        <div class="select">
            <select class="tasks-select">
                <option value="option1" style="--color:red">Option 1</option>
                <option value="option2" style="--color:#FF00AA">Option 2</option>
                <option value="option3" style="--color:#00AAFF">Option 3</option>
            </select>
        </div>
    </div>

</div>

<script src="../scripts/addPage.js"></script>
<script src="../scripts/scroll.js"></script>
<script src="../scripts/changeColor.js"></script>

<?php if ($newPage) { ?>
    <script>successAlert()</script>
<?php } elseif ($newPage != null) { ?>
    <script>errorAlert()</script>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
