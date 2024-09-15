// Handle form switching
document.getElementById('signUpButton').addEventListener('click', function() {
    document.getElementById('signIn').style.display = 'none';
    document.getElementById('signUp').style.display = 'block';
    
    // Clear error or success messages
    clearMessages();
});

document.getElementById('signInButton').addEventListener('click', function() {
    document.getElementById('signUp').style.display = 'none';
    document.getElementById('signIn').style.display = 'block';
    
    // Clear error or success messages
    clearMessages();
});

// Function to clear error and success messages
function clearMessages() {
    const errorMessages = document.querySelectorAll('.error');
    const successMessages = document.querySelectorAll('.success');
    
    errorMessages.forEach(function(message) {
        message.textContent = ''; // Clear error text
    });

    successMessages.forEach(function(message) {
        message.textContent = ''; // Clear success text
    });
}
