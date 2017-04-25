/**
* @Author: Dregend Drewonidas <root>
* @Date:   Monday, October 10, 2016 9:28 PM
* @Email:  dlaminiandrew@gmail.com
* @Last modified by:   root
* @Last modified time: Monday, October 24, 2016 1:58 AM
* @License: maDezynIzM.E. 2016
*/

var register = null;
var login = null;
//join.addEventListener("click", )
function linkEvents() {
	document.getElementById("join").addEventListener("click", toggleLoginForm, false);
	document.getElementById("upload").addEventListener("click", toggleUploadForm, false);
	//document.getElementById("studio_btn").addEventListener("click", openPhotostudio, false);
}

function toggleLoginForm(event)
{
	var form = document.getElementById("access_form");
	if (!register || !login) {
		register = form.children[1];
		login = form.children[0];
	}
	openLogin();
	if (form.style.width == "250px")
		form.style.width = "0";
	else
		form.style.width = "250px";
}

function openRegistration(event) {
	if (register.style.display == "none")
		register.style.display = "flex";
	else
		register.style.display = "none";
}

function openLogin(event) {
	if (login.style.display == "none")
		login.style.display = "flex";
	else
		login.style.display = "flex";
}

function toggleUploadForm(event) {
	var uploadForm = document.getElementById("upload_form");
	if (uploadForm.style.display == "flex")
		uploadForm.style.display = "none";
	else
		uploadForm.style.display = "flex";
}

function openPhotostudio(studio) {
	var studio = document.getElementById("photostudio");
	studio.style.display = "flex";
}
