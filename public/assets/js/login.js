//click to toggle form checkbox reguster
function changeForm() {
    // add checked to "reg-log
    var reglog = document.getElementById("reg-log");
    reglog.checked = true;
}

function validatePassword() {
    var regpass = document.getElementById("regpass");
    var confirmpass = document.getElementById("confirmpass");
    var regpassValue = regpass.value;
    var confirmpassValue = confirmpass.value;
    var regpassRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

    if (regpassRegex.test(regpassValue)) {
        regpass.classList.remove("is-invalid");
        regpass.classList.add("is-valid");
        document.getElementById("passerr").style.display = "none";
    } else {
        regpass.classList.remove("is-valid");
        regpass.classList.add("is-invalid");
        document.getElementById("passerr").style.display = "block";
        document.getElementById("passerr").innerHTML =
            "Kata sandi minimal 8 karakter, 1 huruf besar, 1 huruf kecil, 1 angka";
    }

    if (confirmpassValue === regpassValue) {
        confirmpass.classList.remove("is-invalid");
        confirmpass.classList.add("is-valid");
        document.getElementById("confirerr").style.display = "none";
    } else {
        confirmpass.classList.remove("is-valid");
        confirmpass.classList.add("is-invalid");
        document.getElementById("confirerr").style.display = "block";
        document.getElementById("confirerr").innerHTML =
            "Kata sandi tidak sama";
    }
}

var regpass = document.getElementById("regpass");
regpass.addEventListener("keyup", validatePassword);

var confirmpass = document.getElementById("confirmpass");
confirmpass.addEventListener("keyup", validatePassword);

 function toggleForm() {
     var x = document.getElementById("user-type").value;
     if (x === "siswa") {
         document.getElementById("regmail").style.display = "none";
     } else if (x === "orangtua") {
         document.getElementById("regmail").style.display = "block";
     } else {
         document.getElementById("regmail").style.display = "block";
     }
 }

 function toggleFormBack() {
     var y = document.getElementById("user-type-back").value;
     if (y === "siswa") {
         document.getElementById("regmail").style.display = "none";
     } else if (y === "ortu") {
         document.getElementById("regmail").style.display = "block";
     } else {
         document.getElementById("regmail").style.display = "block";
     }
 }

 function togglePassword(fieldId) {
     var passwordField = document.getElementById(fieldId);
     var toggleButton = document.querySelector(
         `#${fieldId} + .toggle-password`
     );
     if (passwordField.type === "password") {
         passwordField.type = "text";
         toggleButton.innerHTML = "Sembunyikan Kata Sandi";
     } else {
         passwordField.type = "password";
         toggleButton.innerHTML = "Lihat Kata Sandi";
     }
 }
 // toggle password multi regpass and confirmpass
 var regpass = document.getElementById("regpass");
 var confirmpass = document.getElementById("confirmpass");
 var btn = document.getElementById("showpass");

 function togglepass2() {
     if (regpass.type === "password" && confirmpass.type === "password") {
         regpass.type = "text";
         confirmpass.type = "text";
         btn.innerHTML = "Sembunyikan Kata Sandi";
     } else {
         regpass.type = "password";
         confirmpass.type = "password";
         btn.innerHTML = "Lihat Kata Sandi";
     }
 }