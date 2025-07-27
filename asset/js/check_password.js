let state = false;
let password = document.getElementById("password");
let passwordStrength = document.getElementById("password-strength");
let lowUpperCase = document.querySelector(".low-upper-case i");
let number = document.querySelector(".one-number i");
let specialChar = document.querySelector(".one-special-char i");
let eightChar = document.querySelector(".eight-character i");

password.addEventListener("keyup", function(){
    let pass = document.getElementById("password").value;
    checkStrength(pass);
});


function togglePassword(icon) {
  const input = icon.previousElementSibling; // input nằm trước icon
  const isPassword = input.type === "password";
  input.type = isPassword ? "text" : "password";

  icon.classList.toggle("bx-eye");
  icon.classList.toggle("bx-eye-closed");
}

function toggle(){
    if(state){
        document.getElementById("password").setAttribute("type","password");
        state = false;
    }else{
        document.getElementById("password").setAttribute("type","text")
        state = true;
    }
}

document.getElementById('username').addEventListener('blur', function() {
    const username = this.value.trim();
    const errorDiv = document.getElementById('username-error');
    
    if (username.length < 3 || username.length > 50) {
        errorDiv.textContent = 'Username must be 3-50 characters long';
        this.classList.add('error');
    } else if (!/^[a-zA-Z0-9_]+$/.test(username)) {
        errorDiv.textContent = 'Username can only contain letters, numbers, and underscores';
        this.classList.add('error');
    } else {
        errorDiv.textContent = '';
        this.classList.remove('error');
    }
});

document.getElementById('email').addEventListener('blur', function() {
    const email = this.value;
    const errorDiv = document.getElementById('email-error');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailRegex.test(email)) {
        errorDiv.textContent = 'Please enter a valid email address';
        this.classList.add('error');
    } else {
        errorDiv.textContent = '';
        this.classList.remove('error');
    }
});

function validatePassword(){
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirm_password").value;
    let result = document.getElementById("error-message");
    let isValid = true;

    if (!password || !confirmPassword) {
        result.innerHTML = "Both fields are required";
        result.style.color = "red";
        isValid = false;

    } else if (password !== confirmPassword) {
        result.innerHTML = "Passwords do not match";
        result.style.color = "red";
        isValid = false;
    } else {
        result.innerHTML = "Passwords match";
        result.style.color = "green";
        isValid = true;
    }
    return isValid;
}
document.getElementById("signup-btn").addEventListener("click", function(event) {
    if (!validatePassword()) {
        event.preventDefault(); // Dừng form nếu password không hợp lệ
    }
});

function myFunction(show){
    show.classList.toggle("fa-eye-slash");
}

function checkStrength(password) {
    let strength = 0;

    //If password contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
        lowUpperCase.classList.remove('fa-circle');
        lowUpperCase.classList.add('fa-check');
    } else {
        lowUpperCase.classList.add('fa-circle');
        lowUpperCase.classList.remove('fa-check');
    }
    //If it has numbers and characters
    if (password.match(/([0-9])/)) {
        strength += 1;
        number.classList.remove('fa-circle');
        number.classList.add('fa-check');
    } else {
        number.classList.add('fa-circle');
        number.classList.remove('fa-check');
    }
    //If it has one special character
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
        specialChar.classList.remove('fa-circle');
        specialChar.classList.add('fa-check');
    } else {
        specialChar.classList.add('fa-circle');
        specialChar.classList.remove('fa-check');
    }
    //If password is greater than 7
    if (password.length > 7) {
        strength += 1;
        eightChar.classList.remove('fa-circle');
        eightChar.classList.add('fa-check');
    } else {
        eightChar.classList.add('fa-circle');
        eightChar.classList.remove('fa-check');   
    }

    // If value is less than 2
    if (strength < 2) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.add('progress-bar-danger');
        passwordStrength.style = 'width: 10%';
    } else if (strength == 3) {
        passwordStrength.classList.remove('progress-bar-success');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-warning');
        passwordStrength.style = 'width: 60%';
    } else if (strength == 4) {
        passwordStrength.classList.remove('progress-bar-warning');
        passwordStrength.classList.remove('progress-bar-danger');
        passwordStrength.classList.add('progress-bar-success');
        passwordStrength.style = 'width: 100%';
    }
}