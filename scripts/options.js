const input= document.getElementsByTagName('input');
const url = new URL(window.location.href);
const urlPage = url.searchParams.get("page");

function addOption() {
    const optionDiv = document.createElement('div');
    optionDiv.setAttribute('class', 'option');
    optionDiv.innerHTML = `
            <input type="text" name="option" id="option" placeholder="New Option" required>
        <button type="button" onclick="removeOption()"><ion-icon name="close-outline"></ion-icon></ion-icon></button>
    `;
    const options = document.getElementById('options');
    options.append(optionDiv);
    const input = optionDiv.getElementsByTagName('input');
    input[input.length-1].focus();
    option();
}

function removeOption(id) {
    const optionDiv = document.getElementById(id).parentNode;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/deleteOption.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        optionDiv.parentNode.removeChild(optionDiv);
    }
    xhr.send('id='+id);
}

function option(){
    for (let i = 0; i < input.length; i++) {
        let value = input[i].value;
        input[i].addEventListener('blur', function(event) {
            if (value !== event.target.value) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../scripts/editOption.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    console.log(this.responseText);
                }
                xhr.send('id='+event.target.id+'&idPage='+urlPage+'&value='+event.target.value+'&option='+event.target.name);
            }
        });
        input[i].addEventListener('keyup', function(event) {
            if (event.keyCode === 13) {
                event.target.blur();
            }
        });
    }
}

window.addEventListener('beforeunload', function (e) {
    event.target.blur();
});

document.addEventListener('DOMContentLoaded', function() {
    option();
});