function checkPassword() {
	if (document.getElementById("psw").value != document.getElementById("confirmpwd").value) {
		alert("Password mismatch");
		return false;

	} else {
		alert("Welcome");
	}

}

function enablebutton() {
	if (document.getElementById("chekpolicy").checked) {
		document.getElementById("submitbt").disabled = false;
	} else {
		document.getElementById("submitbt").disabled = true;
	}
}

function alertfunction(){
	alert("LOG IN Successfull !");
}