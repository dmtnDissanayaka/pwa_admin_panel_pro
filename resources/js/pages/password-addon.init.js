/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Password addon Js File
*/

// password addon
if (document.getElementById('password-addon'))
	document.getElementById('password-addon').addEventListener('click', function () {
		var passwordInput = document.getElementById("password-input");
		if (passwordInput.type === "password") {
			passwordInput.type = "text";
		} else {
			passwordInput.type = "password";
		}
	});

// password addon
if (document.getElementById('password-addon-con'))
	document.getElementById('password-addon-con').addEventListener('click', function () {
		var passwordInput = document.getElementById("password-input");
		if (passwordInput.type === "password") {
			passwordInput.type = "text";
		} else {
			passwordInput.type = "password";
		}
	});
