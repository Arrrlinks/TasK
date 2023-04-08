function acceptInvitation(idNotification){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/notifications.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        window.location.href = '?notifications';
    }
    xhr.send('idNotification='+idNotification);
}

function declineInvitation(idNotification){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/notifications.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        window.location.href = '?notifications';
    }
    xhr.send('idNotification='+idNotification+'&decline=true');
}