function acceptInvitation(idNotification){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/notifications.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        const acceptButton = document.getElementById('accept'+idNotification);
        acceptButton.parentNode.parentNode.parentNode.removeChild(acceptButton.parentNode.parentNode);

    }
    xhr.send('idNotification='+idNotification);
}

function declineInvitation(idNotification){
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/notifications.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        const acceptButton = document.getElementById('accept'+idNotification);
        acceptButton.parentNode.parentNode.parentNode.removeChild(acceptButton.parentNode.parentNode);
    }
    xhr.send('idNotification='+idNotification+'&decline=true');
}