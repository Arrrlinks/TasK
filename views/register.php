<?php $title = "Register"; ?>
<?php $css = "register.css"; ?>

<?php ob_start(); ?>
<div class="title">
    <a href="?"><span class="title1">Tas</span><span class="title2">K</span></a>
</div>
<div id="login">
    <h1>Register</h1>
    <form method="post">
        <div class="wave-group">
            <input name="email" type="text" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">E</span>
                <span class="label-char" style="--index: 1">m</span>
                <span class="label-char" style="--index: 2">a</span>
                <span class="label-char" style="--index: 3">i</span>
                <span class="label-char" style="--index: 4">l</span>
            </label>
        </div>
        <div class="wave-group" id="input">
            <input name="Fname" type="text" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">F</span>
                <span class="label-char" style="--index: 1">i</span>
                <span class="label-char" style="--index: 2">r</span>
                <span class="label-char" style="--index: 3">s</span>
                <span class="label-char" style="--index: 4">t</span>
                <span class="label-char space" style="--index: 5">N</span>
                <span class="label-char" style="--index: 6">a</span>
                <span class="label-char" style="--index: 7">m</span>
                <span class="label-char" style="--index: 8">e</span>
            </label>
        </div>
        <div class="wave-group" id="input">
            <input name="Lname" type="text" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">L</span>
                <span class="label-char" style="--index: 1">a</span>
                <span class="label-char" style="--index: 2">s</span>
                <span class="label-char" style="--index: 3">t</span>
                <span class="label-char space" style="--index: 4">N</span>
                <span class="label-char" style="--index: 5">a</span>
                <span class="label-char" style="--index: 6">m</span>
                <span class="label-char" style="--index: 7">e</span>
            </label>
        </div>
        <div class="wave-group" id="input">
            <input name="password" type="password" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">P</span>
                <span class="label-char" style="--index: 1">a</span>
                <span class="label-char" style="--index: 2">s</span>
                <span class="label-char" style="--index: 3">s</span>
                <span class="label-char" style="--index: 4">w</span>
                <span class="label-char" style="--index: 5">o</span>
                <span class="label-char" style="--index: 6">r</span>
                <span class="label-char" style="--index: 7">d</span>
            </label>
        </div>
        <div class="wave-group" id="confirm">
            <input name="confirm" type="password" class="input" required>
            <span class="bar"></span>
            <label class="label">
                <span class="label-char" style="--index: 0">C</span>
                <span class="label-char" style="--index: 1">o</span>
                <span class="label-char" style="--index: 2">n</span>
                <span class="label-char" style="--index: 3">f</span>
                <span class="label-char" style="--index: 4">i</span>
                <span class="label-char" style="--index: 5">r</span>
                <span class="label-char" style="--index: 6">m</span>
            </label>
        </div>
        <?= $isCreated ?>

        <button class="login" type="submit">
            <p>Register</p>
            <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
            </svg>
        </button>
        <a class="register" href="?login">Login</a>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>
