<?php $title = "Options"; ?>
<?php $css = "settings.css"; ?>
<?php ob_start(); ?>
    <div class="title">
        <a href="?page=<?= $_GET['page'] ?>"><span class="title1">Tas</span><span class="title2">K</span></a>
    </div>
    <div class="page">
        <h2 id="title"><?= $page['title'] ?></h2>
        <?php if (isPageOwner($_SESSION['id'], $_GET['page'])) { ?>
            <button id="editPageName">
                <ion-icon name="create-outline"></ion-icon>
            </button>
        <?php } ?>
    </div>
    <div class="options" id="options">
        <div class="optionDiv">
            <h2>Options</h2>
            <button onclick="addOption()" type="button" id="addOptionBtn">Add an option</button>
        </div>
        <?php foreach ($options as $option) { ?>
            <div class="option">
                <input type="text" name="edit" id="<?= $option['id'] ?>" placeholder="New Option"
                       value="<?= $option['title']  ?>" required>
                <button type="button" onclick="removeOption('<?= $option['id'] ?>')">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
        <?php } ?>
    </div>
    <script src="../scripts/options.js"></script>
    <script src="../scripts/editTitle.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>