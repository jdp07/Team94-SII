function validateLogin(loginForm) {
	if (document.loginForm.email.value === "" || document.loginForm.password.value === "") {
		return false;
	}
	return true;
}

/** Registration Validation **/

/*
function validateFName(regForm) {
    var name = document.regForm.fName.value;
    name = name.trim();
    if (name === "" || !isNaN(name) || name===null) {
        alert("Not a valid name");
        return false;
    }
    return true;
}

function validateSName(regForm) {
    var name = document.regForm.sName.value;
    name = name.trim();
    if (name === "" || !isNaN(name)) {
        alert("Not a valid name");
        return false;
    }
    return true;
}

function validateReg(regForm) {
    validateFName(regForm);
    validateSName(regForm);
}
*/

/** END Registration Validation **/
