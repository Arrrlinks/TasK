<?php $title = "Options"; ?>
<?php $css = "options.css"; ?>
<?php ob_start(); ?>
<div class="title">
        <a href="?page=<?= $_GET['page'] ?>"><span class="title1">Tas</span><span class="title2">k</span></a>
</div>
    <div class="options" id="options">
        <div class="optionDiv">
            <h2>Options</h2>
            <button onclick="addOption()" type="button" id="addOptionBtn">Add an option</button>
        </div>
        <?php foreach ($options as $option) { ?>
            <div class="option">
                <form method="POST" id="addTaskForm">
                    <input type="hidden" name="id" value="<?= $option['id'] ?>">
                    <input type="text" name="modify" id="option" placeholder="New Option" value="<?= $option['title'] ?>" required>
                </form>
                <button type="button" onclick="removeOption('<?= $option['id'] ?>','<?= $_GET['page'] ?>')">
                    <ion-icon name="remove-circle-outline"></ion-icon>
                </button>
            </div>
        <?php } ?>
    </div>
    <script src="../scripts/options.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>