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
    event.preventDefault(); // Stop the form from submitting the traditional way

    var formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    }).then(response => {
        // Handle the response from sendE.php
        if(response.ok) {
            // Hide the form
            document.getElementById('myForm').style.display = 'none';
            // Show the thank-you message
            document.getElementById('thankYouMessage').style.display = 'block';
        } else {
            // Handle errors
            alert('There was a problem submitting your form. Please try again.');
        }
    }).catch(error => {
        // Handle any other errors
        alert('There was a problem submitting your form. Please try again.');
    });
});