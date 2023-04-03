function addPage() {
    const page = document.getElementById('pagesDisplay');
    const inputCount = page.querySelectorAll('#new').length;

    if (inputCount < 1) {
        page.innerHTML += `
        <form method="post" id="newForm">
        <div class="new" id="new">
            <input id="newInput" type="text" name="pageName" placeholder="New Page">
        </div>
        </form>
        `;
    }
    const newForm = document.getElementById("newForm");
    const newPage = document.getElementById('newInput');
    newForm.addEventListener("submit", function(event) {
        const input = document.getElementById("newInput");
        if (input.value === "") {
            newPage.classList.add("nope");
            setTimeout(function() {
                newPage.classList.remove("nope");
            }, 300);
            event.preventDefault();
        }
    });

    newPage.focus();
    newPage.addEventListener('blur', function () {
        if (newPage.value == '') {
            page.removeChild(page.lastChild);
            page.removeChild(page.lastChild);
        }
    });
}

function successAlert() {
    Swal.fire({
        icon: 'success',
        title: 'Created !',
        showConfirmButton: false,
        timer: 2000
    });
}

function errorAlert() {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href="">Why do I have this issue?</a>'
    });
}