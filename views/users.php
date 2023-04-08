<?php $title = "Users"; ?>
<?php $css = "users.css"; ?>
<?php ob_start(); ?>
    <div class="title">
        <a href="?page=<?= $_GET['page'] ?>"><span class="title1">Tas</span><span class="title2">k</span></a>
    </div>
    <div class="users" id="users">
        <div class="userDiv">
            <h2>Manage Users</h2>
            <button onclick="addUser()" type="button" id="addUserBtn">Add a user</button>
        </div>
            <div class="user">
                <p class="owner"><?= strtoupper($admin['lastName']) . ' ' . ucfirst($admin['firstName']) . ' (Owner) <br>' . $admin['email'] ?></p>
            </div>
        <?php foreach($addedUsers as $user) { ?>
            <div class="user">
                <p><?= strtoupper(getUser($user['idUser'])[0]['lastName']) . ' ' . ucfirst(getUser($user['idUser'])[0]['firstName']) . ' <br>' . getUser($user['idUser'])[0]['email'] ?></p>
                <button type="button" onclick="removeUser('<?= $user['idUser'] ?>','<?= $_GET['page'] ?>')">
                    <ion-icon name="remove-circle-outline"></ion-icon>
                </button>
            </div>
        <?php } ?>
        <?php foreach($waitingUsers as $user) { ?>
            <div class="user">
                <p><?= strtoupper(getUser($user['idUser'])[0]['lastName']) . ' ' . ucfirst(getUser($user['idUser'])[0]['firstName']) . ' (Pending) <br>' . getUser($user['idUser'])[0]['email'] ?></p>
                <button type="button" onclick="removeUser('<?= $user['idUser'] ?>','<?= $_GET['page'] ?>')">
                    <ion-icon name="remove-circle-outline"></ion-icon>
                </button>
            </div>
        <?php } ?>
    </div>
    <script src="../scripts/users.js"></script>
<?php if(!$created && $created!==null) { ?>
    <script>
        alertUserDoesntExist();
    </script>
<?php } ?>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>