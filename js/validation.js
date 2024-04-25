function chkpass(event) {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("confirm-password").value;
    var acceptedinput = /^[a-zA-Z0-9]+$/;

    if (pass1 === "") {
        alert("You did not enter a password.\nPlease enter one now.");
        document.getElementById("password").focus();
        event.preventDefault();
        return false;
    } else if (!acceptedinput.test(pass1)) {
        alert("Illegal characters used.\nOnly numbers and letters are allowed.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        event.preventDefault();
        return false;
    } else if (pass1.length < 6) {
        alert("Minimum password length is 6 characters!");
        document.getElementById("password").focus();
        event.preventDefault();
        return false;
    } else if (pass1 !== pass2) {
        alert("The two passwords do not match.\nPlease re-enter both.");
        document.getElementById("password").focus();
        document.getElementById("password").select();
        event.preventDefault();
        return false;
    } else {
        return true;
    }
}

function chkphone(event) {
    var phone = document.getElementById("mobile-phone").value;
    if (phone.length !== 11) {
        alert("Phone number length should be 11 digits.");
        return false; 
    } else {
        return true;
    }
}

function formchk(event) {
    var flag1 = chkpass(event);
    var flag2 = chkphone(event);
    if (flag1 && flag2) {
        return true;
    } else {
        return false;
    }
}
