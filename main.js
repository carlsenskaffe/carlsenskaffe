window.onload = function () {
    window.addEventListener('scroll', function (e) {
        if (window.scrollY > 100) {
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

document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    }).then(response => {
        // Handle the response from sendE.php
        if(response.ok) {
            this.reset();
            // Show the thank-you message
            alert('Tak for din forespørgsel. Vi vender tilbage hurtigst muligt.')
        } else {
            // Handle errors
            alert('Der opstod en fejl. Prøv venligst igen.');
        }
    }).catch(error => {
        // Handle any other errors
        alert('Der opstod en fejl. Prøv venligst igen.');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const faqHeaders = document.querySelectorAll('.faq-item h3');
    faqHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const parent = this.parentElement;
            const paragraph = parent.querySelector('p');
            if (parent.classList.contains('active')) {
                parent.classList.remove('active');
                paragraph.style.maxHeight = null; // Reset max-height
            } else {
                parent.classList.add('active');
                paragraph.style.maxHeight = paragraph.scrollHeight + "px"; // Set max-height dynamically
            }
        });
    });
});