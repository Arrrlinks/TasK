const input= document.getElementsByTagName('input');
const url = window.location.href;
const page = url.substring(url.lastIndexOf('/') + 1);
let numberofInput = 0;
function addUser() {
    if (numberofInput === 0) {
        numberofInput++;
        const userDiv = document.createElement('div');
        userDiv.setAttribute('class', 'createUser');
        userDiv.innerHTML = `
            <input type="text" name="user" id="user" placeholder="Enter the email of the user you want to add" required>
            <button id="removeInput" ><ion-icon name="close-outline"></ion-icon></button>
    `;
        const user = document.getElementById('users');
        user.append(userDiv);
        const removeInput = document.getElementById('removeInput');
        removeInput.addEventListener('click', function (event) {
            const user = event.target.parentNode;
            user.parentNode.removeChild(user);
            numberofInput--;
            stop();
        });
        input[input.length - 1].focus();
        for (let i = 0; i < input.length; i++) {
            let value = input[i].value;
            input[i].addEventListener('blur', function (event) {
                if (value !== event.target.value) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '../scripts/addUser.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onload = function () {
                        if (this.responseText === 'invalid') {
                            alertUserDoesntExist();
                        } else if (this.responseText === 'alreadyAdded') {
                            alertUserAlreadyAdded();
                        } else if (this.responseText === 'owner') {
                            alertUserIsOwner();
                        } else {
                            const user = JSON.parse(this.responseText);
                            const newUserDiv = document.createElement('div');
                            newUserDiv.setAttribute('class', 'user');
                            newUserDiv.innerHTML = `
                            <p>${user['lastName'].toUpperCase()} ${user['firstName'][0].toUpperCase() + user['firstName'].slice(1)} (Pending) ${user['email']}</p>
                            <button id="${user['id']}" type="button" onclick="removeUser('${user['id']}',page)">
                                <ion-icon name="close-outline"></ion-icon>
                            </button>
                        `;
                            userDiv.parentNode.replaceChild(newUserDiv, userDiv);
                            numberofInput--;
                        }
                    }
                    xhr.send('user=' + event.target.value + '&page=' + page);
                }
            });
            input[i].addEventListener('keyup', function (event) {
                if (event.keyCode === 13) {
                    event.target.blur();
                }
            });
        }
    }
}

window.addEventListener('beforeunload', function (event) {
    event.target.blur();
});

function removeUser(id,page) {
    // remove the parent element of the button
    const idUser = document.getElementById(id);
    const user = idUser.parentNode;
    user.parentNode.removeChild(user);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/removeUser.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {

    }
    xhr.send('id='+id+'&page='+page);
}

function alertUserDoesntExist() {
    Swal.fire({
        title: 'User does not exist',
        text: 'Please enter a valid email',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}

function alertUserAlreadyAdded() {
    Swal.fire({
        title: 'User already added',
        text: 'Please enter a valid email',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}

function alertUserIsOwner() {
    Swal.fire({
        title: 'You can\'t add yourself',
        text: 'Please enter a valid email',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}