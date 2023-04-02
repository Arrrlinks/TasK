function addPage() {
    const page = document.getElementById('pagesDisplay');
    const inputCount = page.querySelectorAll('#new').length;

    if (inputCount < 1) {
        page.innerHTML += `
        <form method="post">
        <div class="new" id="new">
            <input type="text" name="pageName" placeholder="Page Name" required>
        </div>
        </form>
        `;
    }
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