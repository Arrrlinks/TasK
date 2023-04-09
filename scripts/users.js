const input= document.getElementsByTagName('input');
const url = window.location.href;
const page = url.substring(url.lastIndexOf('/') + 1);
function addUser() {
    const userDiv = document.createElement('div');
    userDiv.setAttribute('class', 'user');
    userDiv.innerHTML = `
            <input type="text" name="user" id="user" placeholder="Enter the email of the user you want to add" required>
            <button onclick="removeInput()"><ion-icon name="close-outline"></ion-icon></button>
    `;
    const user = document.getElementById('users');
    user.append(userDiv);
    input[input.length-1].focus();
    for (let i = 0; i < input.length; i++) {
        let value = input[i].value;
        input[i].addEventListener('blur', function(event) {
            // detect if the button is clicked
            if (value !== event.target.value && event.target.parentNode.getElementsByTagName('button')[0].getAttribute('onclick') === '') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../scripts/addUser.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (this.responseText === 'invalid') {
                        alertUserDoesntExist();
                    }
                    else if (this.responseText === 'alreadyAdded') {
                        alertUserAlreadyAdded();
                    }
                    else {
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
                    }
                }
                xhr.send('user='+event.target.value+'&page='+page);
            }
        });
        input[i].addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                event.target.blur();
            }
        });
    }
}

function removeInput() {
    const userDiv = document.getElementById('user').parentNode;
    userDiv.parentNode.removeChild(userDiv);
}

window.addEventListener('beforeunload', function (e) {
    event.target.blur();
});

function removeUser(id,page) {
    // remove the parent element of the button
    const idUser = document.getElementById(id);
    const user = idUser.parentNode;
    console.log(user);
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