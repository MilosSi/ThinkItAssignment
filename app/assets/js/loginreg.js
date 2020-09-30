$(document).ready(function () {


})
function proveraLogin() {

    let email= $("#emailLogin").val();
    let emailRegex=checkEmail(email);

    let password = $("#passLogin").val();
    let passwordRegex=checkPassword(password);

    let errors=true;
    if(emailRegex ==  false)
    {
        $("#emailLogin").css("border","3px solid #ff0000");
        errors = false;
    }
    if(passwordRegex ==  false)
    {
        $("#passLogin").css("border","3px solid #ff0000");
        errors = false;
    }

    return errors;
}

function proveraReg() {

    let username=$("#usernameReg").val();
    let userRegex=checkUsername(username);

    let email= $("#emailReg").val();
    let emailRegex=checkEmail(email);

    let password = $("#passwordReg").val();
    let passwordRegex=checkPassword(password);


    let errors=true;
    if(userRegex ==  false)
    {
        $("#usernameReg").css("border","3px solid #ff0000");
        errors = false;
    }
    if(emailRegex ==  false)
    {
        $("#emailReg").css("border","3px solid #ff0000");
        errors = false;
    }
    if(passwordRegex ==  false)
    {
        $("#passwordReg").css("border","3px solid #ff0000");
        errors = false;
    }

    return errors;
}


function checkUsername(username) {

    //ime
    var regUser=/^[ČĆŠĐŽA-zčćšđž0-9]{1,40}$/;
    var resUser = regUser.test(username);

    return resUser;
}

function checkEmail(email) {

    var regEmail=/^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
    var resEmail=regEmail.test(email);

    return resEmail;
}

function checkPassword(password) {
    var regPass=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/; /* MIN 1 NUM I 1 BR*/
    var resPass= regPass.test(password);

    return resPass;
}
