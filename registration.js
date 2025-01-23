function validateForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\d{10}$/;

    if (name.trim() === "") {
        alert("Please enter your name");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid 10-digit phone number");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    alert("Registration Successful!");
    return true;
}
