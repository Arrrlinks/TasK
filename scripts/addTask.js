const createTaskBtn = document.getElementById('createTaskBtn');


function addOption() {
    const optionDiv = document.createElement('div');
    optionDiv.setAttribute('class', 'option');
    optionDiv.innerHTML = `
        <input type="text" name="option[]" id="option" placeholder="Option" value="Finished" required>
        <button type="button" onclick="removeOption()"><ion-icon name="remove-circle-outline" ></ion-icon></button>
    `;
    const options = document.getElementById('options');
    options.append(optionDiv);
}

function removeOption() {
    const optionDiv = document.getElementsByClassName('option');
    optionDiv[optionDiv.length - 1].remove();
}
createTaskBtn.addEventListener('click', () => {
    if (document.getElementById('addTaskDiv') == null) {
        const addTaskDiv = document.createElement('div');
        addTaskDiv.setAttribute('id', 'addTaskDiv');
        addTaskDiv.innerHTML = `
            <form method="POST" id="addTaskForm">
                <div class="task">
                        <h2><input type="text" name="title" id="titleTask" placeholder="Title" required></h2>
                        <div class="description">
                            <textarea name="description" id="description" cols="70" rows="7" placeholder="Description" required></textarea>
                        </div>
                </div>
                <div class="options" id="options">
                    <div class="optionDiv">
                        <h2>Options</h2><button onclick="addOption()" type="button" id="addOptionBtn">Add an option</button>
                    </div>
                    <div class="option">
                        <input type="text" name="option[]" id="option" placeholder="Option" value="Not started" required>
                        <button type="button" onclick="removeOption()"><ion-icon name="remove-circle-outline" ></ion-icon></button>
                    </div>
                    <div class="option">
                        <input type="text" name="option[]" id="option" placeholder="Option" value="In Progress" required>
                        <button type="button" onclick="removeOption()"><ion-icon name="remove-circle-outline" ></ion-icon></button>
                    </div>
                    <div class="option">
                        <input type="text" name="option[]" id="option" placeholder="Option" value="Finished" required>
                        <button type="button" onclick="removeOption()"><ion-icon name="remove-circle-outline" ></ion-icon></button>
                    </div>
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