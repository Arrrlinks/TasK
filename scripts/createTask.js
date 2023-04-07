const createTaskBtn = document.getElementById('createTaskBtn');
createTaskBtn.addEventListener('click', () => {
    if (document.getElementById('addTaskDiv') == null) {
        const addTaskDiv = document.createElement('div');
        addTaskDiv.setAttribute('id', 'addTaskDiv');
        addTaskDiv.innerHTML = `
            <form method="POST" id="addTaskForm">
                <div class="task">
                        <h2><input type="text" name="title" id="titleTask" placeholder="Title" required></h2>
                        <div class="description">
                            <textarea name="description" id="description" cols="70" rows="6" maxlength="512" placeholder="Description" required></textarea>
                        </div>
                </div>
                <div class="addTaskBtnDiv">
                    <button type="submit" >Create a TasK</button>
                </div>
            </form>
        `;
        const searchCreateDiv = document.getElementById('searchCreateDiv');
        searchCreateDiv.after(addTaskDiv);
        createTaskBtn.innerHTML = 'Cancel';
    } else {
        document.getElementById('addTaskDiv').remove();
        createTaskBtn.innerHTML = 'Create a TasK';
    }
});