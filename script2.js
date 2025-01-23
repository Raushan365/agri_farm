// Create the login button
const loginBtn = document.createElement('a');
loginBtn.className = 'login-btn';
loginBtn.href = '#';
loginBtn.innerText = 'Login';
document.querySelector('header nav ul').appendChild(loginBtn);

// Get the modal elements
const modal = document.getElementById("login-modal");
const closeModalBtn = document.getElementById("close-btn");
const body = document.querySelector('body');

// Show the modal and blur background
loginBtn.onclick = function () {
    modal.style.display = "block";
    body.classList.add('blur-background'); // Add a class to blur background
}

// Close the modal
closeModalBtn.onclick = function () {
    modal.style.display = "none";
    body.classList.remove('blur-background'); // Remove blur on close
}

// Close the modal if outside click
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
        body.classList.remove('blur-background'); // Remove blur on outside click
    }
}
