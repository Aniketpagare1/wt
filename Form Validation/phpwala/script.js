// script.js
function validateForm() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    // Client-side validation
    if (username.trim() === '' || email.trim() === '' || password.trim() === '') {
      alert('All fields are required.');
      return false;
    }
  
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert('Invalid email format.');
      return false;
    }
  
    // Password validation
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
    if (!passwordRegex.test(password)) {
      alert('Password must contain at least one letter and one number.');
      return false;
    }
  
    return true;
  }
  