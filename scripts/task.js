const editTaskBtn = document.getElementsByClassName('editTask');
const pageId = new URLSearchParams(window.location.search).get('page');
let isEditing = 0;

function removeTask() {
    const removeTaskBtn = document.getElementsByClassName('removeTask');
    for (let i = 0; i < removeTaskBtn.length; i++) {
        removeTaskBtn[i].addEventListener('click', function () {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const task = this.parentElement.parentElement;
                    task.remove();
                    const xhr = new XMLHttpRequest();
                    const id = this.id;
                    xhr.open('POST', '../scripts/deleteTask.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('id=' + id);
                }
            });
        });
    }
}

function editTask() {
    if (isEditing === 0) {
        isEditing = 1;
        const task = this.parentElement.parentElement;
        const taskTitle = task.getElementsByTagName('h2')[0];
        const description = task.getElementsByClassName('description')[0];
        const textDescription = description.getElementsByTagName('p')[0];
        const removeBtn = task.getElementsByClassName('removeTask')[0];
        const taskTitleValue = taskTitle.innerHTML;
        const taskDescriptionValue = textDescription.innerHTML;
        console.log(taskTitleValue);
        console.log(taskDescriptionValue.trim());
        /* transform task title in input */
        const inputTitle = document.createElement('input');
        inputTitle.setAttribute('type', 'text');
        inputTitle.setAttribute('name', 'title');
        inputTitle.setAttribute('id', 'title');
        inputTitle.setAttribute('value', taskTitle.innerHTML);
        taskTitle.replaceWith(inputTitle);
        const title = document.getElementById('title');
        title.focus();
        document.execCommand('selectAll', false, null);
        /* transform task description in textarea */
        const textareaDescription = document.createElement('textarea');
        textareaDescription.setAttribute('name', 'description');
        textareaDescription.setAttribute('id', 'description');
        textareaDescription.innerHTML = textDescription.innerHTML.trim();
        textDescription.replaceWith(textareaDescription);
        /* transform edit button in save button */
        const saveBtn = document.createElement('button');
        saveBtn.setAttribute('type', 'button');
        saveBtn.setAttribute('class', 'saveTask');
        saveBtn.setAttribute('id', this.id);
        saveBtn.innerHTML = '<ion-icon name="checkmark-circle-outline"></ion-icon>';
        this.replaceWith(saveBtn);
        /* transform delete button in cancel button */
        const cancelBtn = document.createElement('button');
        cancelBtn.setAttribute('type', 'button');
        cancelBtn.setAttribute('class', 'cancelTask');
        cancelBtn.setAttribute('id', this.id);
        cancelBtn.innerHTML = '<ion-icon name="close-circle-outline"></ion-icon>';
        removeBtn.replaceWith(cancelBtn);
        const saveTaskBtn = document.getElementsByClassName('saveTask')[0];
        /* add event listener to save button */
        saveBtn.addEventListener('click', function () {
            const xhr = new XMLHttpRequest();
            const id = this.id;
            xhr.open('POST', '../scripts/editTask.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id + '&title=' + title.value + '&description=' + document.getElementById('description').value);
            /* update task title */
            const updateTitle = document.createElement('h2');
            updateTitle.innerHTML = title.value;
            title.replaceWith(updateTitle);
            /* update task description */
            const updateDescription = document.createElement('p');
            updateDescription.innerHTML = document.getElementById('description').value;
            document.getElementById('description').replaceWith(updateDescription);
            /* update save button in edit button */
            const editBtn = document.createElement('button');
            editBtn.setAttribute('type', 'button');
            editBtn.setAttribute('class', 'editTask');
            editBtn.setAttribute('id', id);
            editBtn.innerHTML = '<ion-icon name="create-outline"></ion-icon>';
            this.replaceWith(editBtn);
            /* update cancel button in delete button */
            const deleteBtn = document.createElement('button');
            deleteBtn.setAttribute('type', 'button');
            deleteBtn.setAttribute('class', 'removeTask');
            deleteBtn.setAttribute('id', id);
            deleteBtn.innerHTML = '<ion-icon name="trash-outline"></ion-icon>';
            cancelBtn.replaceWith(deleteBtn);
            /* add event listener to edit button */
            editBtn.addEventListener('click', editTask);
            /* add event listener to cancel button */
            const removeTaskBtn = document.getElementsByClassName('removeTask');
            removeTask();
            isEditing = 0;
        });
        /* add event listener to cancel button */
        cancelBtn.addEventListener('click', function () {
            const id = this.id;
            /* update task title */
            const updateTitle = document.createElement('h2');
            updateTitle.innerHTML = taskTitleValue;
            title.replaceWith(updateTitle);
            /* update task description */
            const updateDescription = document.createElement('p');
            updateDescription.innerHTML = taskDescriptionValue;
            document.getElementById('description').replaceWith(updateDescription);
            /* update save button in edit button */
            const editBtn = document.createElement('button');
            editBtn.setAttribute('type', 'button');
            editBtn.setAttribute('class', 'editTask');
            editBtn.setAttribute('id', id);
            editBtn.innerHTML = '<ion-icon name="create-outline"></ion-icon>';
            saveTaskBtn.replaceWith(editBtn);
            /* update cancel button in delete button */
            const deleteBtn = document.createElement('button');
            deleteBtn.setAttribute('type', 'button');
            deleteBtn.setAttribute('class', 'removeTask');
            deleteBtn.setAttribute('id', id);
            deleteBtn.innerHTML = '<ion-icon name="trash-outline"></ion-icon>';
            this.replaceWith(deleteBtn);
            /* add event listener to edit button */
            editBtn.addEventListener('click', editTask);
            /* add event listener to cancel button */
            const removeTaskBtn = document.getElementsByClassName('removeTask');
            removeTask();
            isEditing = 0;
        });
    }
    else{
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'You are already editing a task!',
        });
    }
}

for (let i = 0; i < editTaskBtn.length; i++) {
    editTaskBtn[i].addEventListener('click', function () {
        editTask.call(this);
    });
}

document.addEventListener('DOMContentLoaded', function () {
    removeTask();
});