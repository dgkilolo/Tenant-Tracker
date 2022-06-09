function checkPassword(){
    let password = document.getElementById("password").value;
    let confirmpassword = document.getElementById("confirmpassword").value;
    console.log(password,confirmpassword);

    let message = document.getElementById("message");

    if (password.length != 0) {
        if(password == confirmpassword){
            message.textContent = "Passwords Match";
            message.style.backgroundColor = "#3ae374";
        }
        else {
            message.textContent = "Passwords don't match";
            message.style.backgroundColor = "#ff4d4d";
        }
    }

    else {
        alert("Password can't be empty! ");
        message.textContent = "";
    }
}


checkPassword();