function validateLogin(loginForm) {
	if (document.loginForm.email.value === "" || document.loginForm.password.value === "") {
		return false;
	}
	return true;
}

/** Registration Validation **/


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

function validatePWord(regForm) {
    if (document.regForm.password1.value === document.regForm.password2.value) {
        return true;
    }
    return false;
}

function validateReg(regForm) {
    if (validateFName(regForm) && validateSName(regForm) && validatePWord(regForm)){
		return true;
	}
	return false;
}
/** END Registration Validation **/

/** show-hide in individual event page **/
$('#show').click(function() {
	$('#rsvp-content').show('blind');
	$('#show').hide();
	$('#hide').show();
});

$('#hide').click(function() {
	$('#rsvp-content').hide('blind');
	$('#hide').hide();
	$('#show').show();
});
/** show-hide in individual event page **/


/** RSVP-submit **/

function submitConfirmation(eventID, id) {
//     console.log("aaaaa");

    if(confirm("Click OK to payment.")) {
//         rsvpSubmitFnc(eventID, id);
        document.write(eventID, id);
    }

    else {
        document.write("cancelled");
    }


//     var rsvpform = document.getElementById(id);
//     rsvpform.action = '../pages/insertRSVP.php';
//     rsvpform.submit();
//
//     rsvpSubmitFnc
}

function rsvpSubmitFnc(eventID, id) {
//     console.log("aaaaa");

    var rsvpform = document.getElementById(id);
    rsvpform.action = '../pages/insertRSVP.php';
    rsvpform.submit();
}

function editor(){
	change(0);
	setTimeout( function() { dothingswithsleep( 1 ); }, 1000 );
	change(1);
	setTimeout( function() { dothingswithsleep( 1 ); }, 1000 );
	change(2);
	setTimeout( function() { dothingswithsleep( 1 ); }, 1000 );
	change(3);
	var s = document.createElement('submit');
	document.appendChild(s);
}

function change(index){
		var e = document.getElementsByTagName('span')[index];

		var d = document.createElement('input');
		var i = document.createTextNode("hello");
		d.type = "text";
		d.innerHTML = e.innerHTML;

		d.value = d.innerHTML;
		e.parentNode.insertBefore(d, e);
		e.parentNode.removeChild(e);
}


/** RSVP-submit **/
