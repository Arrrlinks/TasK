const tasksSelects = document.getElementsByClassName("tasks-select");
for (let i = 0; i < tasksSelects.length; i++) {
    tasksSelects[i].addEventListener("change", (event) => {
        const selectedOption = event.target.selectedOptions[0];
        const optionStyles = getComputedStyle(selectedOption);
        event.target.style.backgroundColor = optionStyles.getPropertyValue('--color');
    });
}