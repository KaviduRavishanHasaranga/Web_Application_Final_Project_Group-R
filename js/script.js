document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.getElementById("menu-icon");
    const navMenu = document.querySelector(".navmenu");

    menuIcon.addEventListener("click", function () {
        navMenu.classList.toggle("active");
    });
});


document.getElementById('edit-address-btn').addEventListener('click', function() {
    var form = document.getElementById('edit-address-form');
    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
});



document.getElementById('contactForm').addEventListener('submit', function(e) {
    let valid = true;

    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.classList.remove('error'));

    // Title
    const title = document.getElementById('titles');
    if (title.value === '') {
        valid = false;
        title.classList.add('error');
    }

    // Full Name
    const fullName = document.getElementById('fullName');
    if (fullName.value.trim() === '') {
        valid = false;
        fullName.classList.add('error');
    }

    // Email
    const email = document.getElementById('email');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        valid = false;
        email.classList.add('error');
    }

    // Phone
    const phone = document.getElementById('phone');
    if (phone.value.trim() === '' || isNaN(phone.value)) {
        valid = false;
        phone.classList.add('error');
    }

    // City
    const city = document.getElementById('city');
    if (city.value.trim() === '') {
        valid = false;
        city.classList.add('error');
    }

    // Subject
    const subject = document.getElementById('subject');
    if (subject.value.trim() === '') {
        valid = false;
        subject.classList.add('error');
    }

    // Budget
    const budget = document.getElementById('budget');
    if (budget.value.trim() === '') {
        valid = false;
        budget.classList.add('error');
    }

    // Message
    const message = document.getElementById('message');
    if (message.value.trim() === '') {
        valid = false;
        message.classList.add('error');
    }

    // If not valid, prevent form submission
    if (!valid) {
        e.preventDefault();
    }
});