function validateLogin(loginForm){
	if (document.loginForm.email.value == "" || document.loginForm.password.value == ""){
		return false;
	}
	return true;
}