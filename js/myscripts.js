//FILLS SECOND SEARCH DROP DOWN ON HOME PAGE
function fill(opt1, opt2) {
	var opt1 = document.getElementById(opt1);
	var opt2 = document.getElementById(opt2);
	
	opt2.innerHTML = "";
	if (opt1.value == "Rating"){
		var optionArray = ["5", "4", "3", "2", "1"];
	}
	for (var option in optionArray){
		var pair = optionArray[option];
		var newOption = document.createElement("option");
		newOption.value = pair;
		newOption.innerHTML = pair;
		opt2.options.add(newOption);
	}
}
//END FILL

//VALIDATES HOME PAGE SEARCHES
function validateText(myform){
	if (!checkSearch(myform)){
		return false;
	}
	return true;
}
function checkSearch(myform){
	if (document.myform.search.value == ""){
		document.getElementById("searchMissing").style.visibility = "visible";
		return false;
	}
	return true;
}

function invisibleText(){
	document.getElementById("searchMissing").style.visibility = "hidden";
}

function validateCategory(myform){
	if (!checkCategory(myform)){
		return false;
	}
	return true;
}

function checkCategory(myform){
	if (document.myform.option1.value == "Nil"){
		document.getElementById("categorySearch").style.visibility = "visible";
		return false;
	}
	return true;
}

function invisibleText(){
	document.getElementById("categorySearch").style.visibility = "hidden";
}
//END HOME PAGE VALIDATION

/*CHECKS ENTRIES IN REGISTRATION */
function validateRegister(myform1){
	var entry = true;
	if (!checkName(myform1)){
		entry =  false;
	}
	if (!checkSurname(myform1)){
		entry =  false;
	}
	if (!checkDOB(myform1)){
		entry =  false;
	}
	if (!checkEmail(myform1)){
		entry =  false;
	}
	if (!checkPassword(myform1)){
		entry =  false;
	}
	return entry;
}
function checkName(myform){
	if (document.myform1.firstName.value == ""){
		document.getElementById("fName").style.visibility = "visible";
		return false;
	}
	return true;
}
function fNameOff(){
	document.getElementById("fName").style.visibility = "hidden";
}
function checkSurname(myform){
	if (document.myform1.surname.value == ""){
		document.getElementById("sName").style.visibility = "visible";
		return false;
	}
	return true;
}
function sNameOff(){
	document.getElementById("sName").style.visibility = "hidden";
}
function checkDOB(myform1){
	if (document.myform1.birthdate.value == ""){
		document.getElementById("dob").style.visibility = "visible";
		return false;
	}
	return true;
}
function dobOff(){
	document.getElementById("dob").style.visibility = "hidden";
}
function checkEmail(myform1){
	if (document.myform1.Email.value == ""){
		document.getElementById("email").style.visibility = "visible";
		return false;
	}
	return true;
}
function emailOff(){
	document.getElementById("email").style.visibility = "hidden";
}
function checkPassword(myform1){
	if (document.myform1.password1.value == ""){
		document.getElementById("viewPassword").style.visibility = "visible";
		return false;
	}
	if (document.myform1.password1.value == document.myform1.password2.value){
		return true;
	}
	else{
		document.getElementById("viewPassword").style.visibility = "visible";
		return false;
	}
}
function passwordOff(){
	document.getElementById("viewPassword").style.visibility = "hidden";
}
/* END CHECK ENTRIES IN REGISTRATION*/

/* VALIDATION FOR LOGIN */

function validateLogin(myform2){
	if (!checkMatch(myform2)){
		return false;
	}
	return true;
}
function checkMatch(myform2){
	if (document.myform2.username.value == "" || document.myform2.password.value == ""){
		document.getElementById("incorrect").style.visibility = "visible";
		return false;
	}
	
	return true;
}
function incorrectOff(){
	document.getElementById("incorrect").style.visibility = "hidden";
}

/* END LOGIN VALIDATION */

//LOCATION



function getLocation() {

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} else {
		document.getElementById("status").innerHTML="Geolocation is not supported by this browser.";
	}
}

function showPosition(position) {
	
	var coord = position.coords.latitude + "," + position.coords.longitude;
	var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="+coord+"&zoom=13&size=600x400&sensor=true";
	//document.getElementById("status").innerHTML = "Your coordinates are: " +coord;
	document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
	initialize();
	
/* 	var mapOptions = {
		zoom: 8,
		center: coord
	} */
/* 	var map = new google.maps.Map(document.getElementById('mapholder'), mapOptions);
	var marker = new google.maps.Marker({
		position: coord,
		map: map,
		title: 'Hello World!'
	});
	marker.setMap(img_url); */
}


/* function initialize() {
  var myLatlng = new google.maps.LatLng(-27.4667, 153.0333);
  var mapOptions = {
    zoom: 4,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}

function showError(error) {
	var msg = "";
	switch(error.code) {
		case error.PERMISSION_DENIED:
			msg = "User denied the request for Geolocation."
			break;
		case error.POSITION_UNAVAILABLE:
			msg = "Location information is unavailable."
			break;
		case error.TIMEOUT:
			msg = "The request to get user location timed out."
			break;
		case error.UNKNOWN_ERROR:
			msg = "An unknown error occurred."
			break;
	}
	document.getElementById("status").innerHTML = msg;
} */

function initialize() {
	var mapOptions = {
		zoom: 11,
		center: new google.maps.LatLng(-27.4667, 153.0333)
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);
}

function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp' +
      '&signed_in=true&callback=initialize';
	document.body.appendChild(script);
}

 //END LOCATION
