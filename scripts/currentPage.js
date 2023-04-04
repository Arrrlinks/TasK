const pagesDisplay = document.getElementsByClassName('page');
for (let i = 0; i < pagesDisplay.length; i++) {
    //compare the page id with the page id in the url
    const currentPage = pagesDisplay[i].id;
    let url = new URL(window.location.href);
    let urlPage = url.searchParams.get("page");
    if (currentPage == urlPage) {
        pagesDisplay[i].style.transition = 'unset';
        pagesDisplay[i].style.backgroundSize = '50% .1em';
        pagesDisplay[i].style.backgroundPosition = '10% 100%, 90% 100%';
    }
}