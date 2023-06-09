function deletePage(pageId,userId) {
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
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../scripts/deletePage.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                window.location.href = '?';
            }
            xhr.send('idPage='+pageId+'&idUser='+userId);
        }
    });
}