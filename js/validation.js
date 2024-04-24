function chkpass(event){
pass1=document.getElementById("password").value
pass2=document.getElementById("con-password").value
var acceptedinput = /^[a-zA-Z0-9]+$/;

if (pass1 == "") {
    alert ("You did not enter a password \n" +
           "Please enter one now");
    pass1.focus();
    event.preventDefault();
    return false;
  }
else if(!acceptedinput.test(pass1)){
    alert("illegal character used \nnumbers and letters only allowed")
    pass1.focus();
    pass1.select();
    event.preventDefault();
    return false;

}
else if(pass1.length<6){
    alert("minimum 6 character!")
    pass1.focus();
    event.preventDefault();
    return false;

}

else if(pass1 !== pass2){
    alert("The two passwords are not the same \n" +
    "Please re-enter both now")
    pass1.focus();
	pass1.select();
    event.preventDefault();
    return false;
}
else{
return true
}
}
function chkphone(event){
    phone=document.getElementById("Phone").value;
    if(phone.length!==11){
        alert("phone number length should be 11 number")
        event.preventDefault();

        phone.focus();
        return false;
    }
    else{
        return true
    }
}
function formchk(event){
    flage1=chkpass(event)
    flage2=chkphone(event)

    if(flage1&& flage2){
        document.getElementById("signupform").action="../php/register.php"
        return true;

    }
    else {return false}
}
