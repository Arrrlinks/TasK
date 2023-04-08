const taskSelect = document.getElementsByClassName('tasks-select');

for (let i = 0; i < taskSelect.length; i++) {
    taskSelect[i].addEventListener('change', function () {
        const idOption = this.value;
        const idTask = getComputedStyle(taskSelect[i]).getPropertyValue('--idTask');
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../scripts/changeOption.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('idOption='+idOption+'&idTask='+idTask);
    });
}