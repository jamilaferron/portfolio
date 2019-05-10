const iconMenu = document.querySelector('.menu_toggler');
const menu = document.querySelector('nav');

iconMenu.addEventListener('click', function () {
    this.classList.toggle('active');
    menu.classList.toggle('active');
})