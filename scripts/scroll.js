document.addEventListener('DOMContentLoaded', function () {
    scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
    })
});

const homePage = document.getElementById('homePage');
const taskContainer = document.getElementById('taskContainer');
window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;
    let element = document.getElementById('title1');
    let element2 = document.getElementById('title2');
    let newFontSize = 90 - scrollPosition / 5;
    let newHeight = 75 - scrollPosition / 5;
    let newTop = 85 - scrollPosition / 8;
    if (newFontSize >= 40) {
        element.style.fontSize = newFontSize + 'px';
        element2.style.fontSize = newFontSize + 'px';
    } else {
        element.style.fontSize = 40 + 'px';
        element2.style.fontSize = 40 + 'px';
    }
    if (newHeight >= 19) {
        homePage.style.height = newHeight + 'vh';
    } else {
        homePage.style.height = 19 + 'vh';
    }
    if (newTop >= 60) {
        taskContainer.style.top = newTop + 'vh';
    } else {
        taskContainer.style.top = 60 + 'vh';
    }
});

