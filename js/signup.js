const form = document.getElementById('sign_form');
const username = document.getElementById('username');
const mobilenumber = document.getElementById('mobilenumber');
const userpassword = document.getElementById('userpassword');
const userpasswordrepeat = document.getElementById('userpasswordrepeat');

form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errrorDisplay = inputControl.querySelector('.error');

    errrorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errrorDisplay = inputControl.querySelector('.error');

    errrorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};


const validateInputs = () => {
    const usernamevalue = username.value.trim();
    const mobilenumbervalue = mobilenumber.value.trim();
    const userpasswordvalue = userpassword.value.trim();
    const userpasswordrepeatvalue = userpasswordrepeat.value.trim();

    if (usernamevalue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if (mobilenumbervalue === '') {
        setError(mobilenumber, 'Mobile number is required');
    } else {
        setSuccess(mobilenumber);
    }

    if(userpasswordvalue === '') {
        setError(userpassword, 'Password is required');
    } else {
        setSuccess(userpassword);
    }

    if(userpasswordrepeatvalue === '') {
        setError(userpasswordrepeat, 'Please confirm your password');
    } else if (userpasswordrepeatvalue !== userpasswordvalue) {
        setError(userpasswordrepeat, "Passwords doesn't match");
    } else {
        setSuccess(userpasswordrepeat);
    }

};
console.log("hello");

