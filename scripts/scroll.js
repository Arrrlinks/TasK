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
const menu = document.getElementById('menu');
window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;
    let newFontSize = 90 - scrollPosition / 5;
    let newHeight = 75 - scrollPosition / 5;
    let newTop = 85 - scrollPosition / 8;
    let newTop2 = 85 - scrollPosition / 5;
    let newMargin = 0 - scrollPosition / 2;
    if (newFontSize >= 40) {
        element.style.fontSize = newFontSize + 'px';
        element2.style.fontSize = newFontSize + 'px';
    } else {
        element.style.fontSize = 40 + 'px';
        element2.style.fontSize = 40 + 'px';
    }
    if(newMargin >= -100) {
        title.style.top = 'unset';
    }
    else {
        title.style.top = 15 + 'px';
    }
    if (newHeight >= 18) {
        homePage.style.height = newHeight + 'vh';
    } else {
        homePage.style.height = 18 + 'vh';
    }
    if (newTop >= 65) {
        taskContainer.style.top = newTop + 'vh';
    } else {
        taskContainer.style.top = 65 + 'vh';
    }
    if (newTop2 >= 25) {
        menu.style.top = newTop2 + 'vh';
    }
    else {
        menu.style.top = 25 + 'vh';
    }
});

