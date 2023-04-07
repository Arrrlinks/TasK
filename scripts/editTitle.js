const editPageName = document.getElementById('editPageName');
const title = document.getElementById('title');
editPageName.addEventListener('click', () => {
    title.contentEditable = true;
    title.focus();
    document.execCommand('selectAll', false, null);
});
function editTitle() {

}

title.addEventListener('blur', () => {
    title.contentEditable = false;
    let titleValue = title.innerText;
    let url = new URL(window.location.href);
    let page = url.searchParams.get("page");
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../scripts/editTitle.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('title=' + titleValue + '&page=' + page);
});

title.addEventListener("keypress", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        title.blur();
    }
});

