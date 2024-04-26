const form = document.getElementById("signupform");
const errormessage = document.getElementById("errormessage");
const pass1 = document.getElementById("password");
const pass2 = document.getElementById("confirmpassword");
const phone = document.getElementById("mobilephone");
const email = document.getElementById("email")

const acceptedPass = /^[a-zA-Z0-9]{8,}$/;
const acceptedPhone = /^[0-9]{11}$/;
const acceptedemail=/^[a-zA-Z-0-9\.-]+@[a-zA-Z-0-9]+\.[a-zA-Z]{2,8}$/;

form.addEventListener("submit", function(event) {
  let passwchk = false;
  let phonechk = false;
  let emailchk=false;

  errormessage.textContent = "";
  errormessage.style.visibility = "hidden";


  if (pass1.value!== pass2.value) {
    setError(pass1, "Passwords do not match");
    setError(pass2, "Passwords do not match");
    
  } else if (!acceptedPass.test(pass1.value)) {
    if (pass1.value.length < 8) {
      setError(pass1, "Password should be more than 8 characters");
    } 
    else {
      setError(pass1, "Enter letters [A-Z], and numbers [0-9] only");
    }
  } else {
    passwchk = true;
  }

  if (!acceptedPhone.test(phone.value)) {
    if(phone.value.length !== 11){
      setError(phone,"phone number should be 11 numbers")
    }
    else{
    setError(phone, "Invalid phone number format");
    }
  }
   else {
    phonechk = true;
  }

if(!acceptedemail.test(email.value)){
  setError(email,"email invalid should be \"exmaple@example.com\" ")
}
else {
  emailchk=true;
} 


  if (!(passwchk && phonechk && emailchk)) {
    event.preventDefault();
    return false;
  }
});

function setError(element, message) {
  element.style.border = "2px solid red";
  errormessage.textContent = message;
  errormessage.style.visibility = "visible";
  element.focus();
  element.select();
}
