window.onload = function () {
    window.addEventListener('scroll', function (e) {
        if (window.pageYOffset > 100) {
            this.document.querySelector("header").classList.add('is-scrolling');
        } else {
            this.document.querySelector("header").classList.remove('is-scrolling');
        }
    });

    const burger_button = document.querySelector('.hamburger');
    const mobile_menu = document.querySelector('.mobile-nav');
    
    burger_button.addEventListener('click', function () {
        burger_button.classList.toggle('is-active');
        mobile_menu.classList.toggle('is-active');
    })
}