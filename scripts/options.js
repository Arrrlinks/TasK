const input = document.getElementsByTagName('input');

function addOption() {
    const optionDiv = document.createElement('div');
    optionDiv.setAttribute('class', 'option');
    optionDiv.innerHTML = `
        <form method="POST" id="addTaskForm">
            <input type="text" name="option" id="option" placeholder="New Option" required>
        </form>
        <button type="button" onclick="removeOption()"><ion-icon name="remove-circle-outline" ></ion-icon></button>
    `;
    const options = document.getElementById('options');
    options.append(optionDiv);
    const input = optionDiv.getElementsByTagName('input');
    input[input.length-1].focus();
    for (let i = 0; i < input.length; i++) {
        let value = input[i].value;
        input[i].addEventListener('blur', function(event) {
            if (value !== event.target.value) {
                const form = event.target.parentNode;
                form.submit();
            }
            else {
                optionDiv.parentNode.removeChild(optionDiv);
            }
        });
    }
}

function removeOption(id,page) {

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/options.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        window.location.href = 'index.php?options&page='+page;
    }
    xhr.send('id='+id);
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