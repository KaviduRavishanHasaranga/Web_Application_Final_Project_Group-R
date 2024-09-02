document.getElementById("contactForm").addEventListener("submit", function(event) {
    var fullName = document.getElementById("fullName").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;

    // Basic validation checks
    if (fullName.length < 3 || fullName.length > 10) {
        alert("Full Name must be between 3 and 50 characters.");
        event.preventDefault();
    }

    if (!/^\d{10}$/.test(phone)) {
        alert("Phone number must be 10 digits.");
        event.preventDefault();
    }

    if (!email.includes("@")) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    }
});