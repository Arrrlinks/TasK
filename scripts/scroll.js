document.addEventListener('DOMContentLoaded', function () {
    scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
    })
});

const element = document.getElementById('title1');
const element2 = document.getElementById('title2');
const homePage = document.getElementById('homePage');
const taskContainer = document.getElementById('taskContainer');
const title = document.getElementById('wholeTitle');
window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;
    let newFontSize = 90 - scrollPosition / 5;
    let newHeight = 75 - scrollPosition / 5;
    let newTop = 85 - scrollPosition / 8;
    let newMargin = 0 - scrollPosition / 5;
    if (newFontSize >= 40) {
        element.style.fontSize = newFontSize + 'px';
        element2.style.fontSize = newFontSize + 'px';
    } else {
        element.style.fontSize = 40 + 'px';
        element2.style.fontSize = 40 + 'px';
    }
    if(newMargin >= -8) {
        title.style.marginTop = newMargin + '%';
    }
    else {
        title.style.marginTop = -8 + '%';
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

