<?php $title = "TasK"; ?>
<?php $css = "notifications.css"; ?>
<?php ob_start(); ?>
    <div class="title">
        <a href="?"><span class="title1">Tas</span><span class="title2">k</span></a>
    </div>
    <div class="notifications">
        <div class="notificationsDiv">
            <h2>Notifications</h2>
        </div>
        <?php if ($notifications == null) { ?>
            <div class="noNotifications">
                <p>There are no notifications</p>
            </div>
        <?php } else { ?>
        <?php foreach ($notifications as $notification) { ?>
            <div class="user">
                <p>You were invited
                    by <?= strtoupper(getSender($notification['idUser'])[0]['lastName']) . ' ' . ucfirst(getSender($notification['idUser'])[0]['firstName']) ?>
                    to collaborate on the project <?= getPage($notification['idUser'])[0]['title'] ?> </p>
                <div>
                    <button type="button" onclick="acceptInvitation('<?= $notification['id'] ?>')">Accept</button>
                    <button type="button" onclick="declineInvitation('<?= $notification['id'] ?>')">Decline</button>
                </div>
            </div>
        <?php }} ?>
    </div>
    <script src="../scripts/notifications.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('views/template.php'); ?>