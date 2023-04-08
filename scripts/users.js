const input= document.getElementsByTagName('input');

function addUser() {
    const userDiv = document.createElement('div');
    userDiv.setAttribute('class', 'user');
    userDiv.innerHTML = `
        <form method="POST" id="addTaskForm">
            <input type="text" name="user" id="user" placeholder="Enter the email of the user you want to add" required>
        </form>
    `;
    const user = document.getElementById('users');
    user.append(userDiv);
    input[input.length-1].focus();
    for (let i = 0; i < input.length; i++) {
        let value = input[i].value;
        input[i].addEventListener('blur', function(event) {
            if (value !== event.target.value) {
                const form = event.target.parentNode;
                form.submit();
            }
            else {
                userDiv.parentNode.removeChild(userDiv);
            }
        });
    }
}

function removeUser(id,page) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/removeUser.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('id='+id+'&page='+page);
}

for (let i = 0; i < input.length; i++) {
    let value = input[i].value;
    input[i].addEventListener('blur', function(event) {
        if (value !== event.target.value) {
            const form = event.target.parentNode;
            form.submit();
        }
    });
}

function alertUserDoesntExist() {
    Swal.fire({
        title: 'User does not exist',
        text: 'Please enter a valid email',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}