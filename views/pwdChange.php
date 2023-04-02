<?php $title = "Change Password"; ?>
<?php $css = "pwdChange.css"; ?>

<?php ob_start(); ?>
<div id="login">
    <h1>Change Password</h1>
    <form method="post">
        <div class="wave-group">
            <input name="current" type="password" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">C</span>
                <span class="label-char" style="--index: 1">u</span>
                <span class="label-char" style="--index: 2">r</span>
                <span class="label-char" style="--index: 3">r</span>
                <span class="label-char" style="--index: 4">e</span>
                <span class="label-char" style="--index: 5">n</span>
                <span class="label-char" style="--index: 6">t</span>
            </label>
        </div>
        <div class="wave-group" id="password">
            <input name="new" type="password" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">N</span>
                <span class="label-char" style="--index: 1">e</span>
                <span class="label-char" style="--index: 2">w</span>
            </label>
        </div>
        <?= $isChanged ?>
        <button class="login" type="submit">
            <p>Change</p>
            <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
        </button>
        <button class="home" onclick="window.location.href='?'">Home</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
