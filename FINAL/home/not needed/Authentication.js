function login()
{
		//AJAX
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("uname").value;
		var b = document.getElementById("pwd").value;
		var data = 'username='+a+'&password='+b;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != "")
	            	document.getElementById("txtHint").innerHTML = this.responseText;
	            else
	            	window.location = "Homepage.php";
	        }
	    };
	    xmlhttp.open("POST", "login.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	
}
/*
function check()
{
	var x = document.getElementById("pwd1");
	var y = document.getElementById("pwd2");

	if(x.value != y.value)
		document.getElementById("alert").innerHTML = "Password values don't match";
	else
		document.getElementById("alert").innerHTML = "";
}

function chkpwd(x)
{
	if(document.getElementById("username").value == "")
		document.getElementById("alert").innerHTML = "Please enter Username";
	else
	{
		document.getElementById("alert").innerHTML = "";
		x.type = "submit";
		document.getElementById("rtpwd").submit();
	}	
}

function validate()
{
	var a = document.getElementById("username");
	var g = document.getElementById("password");
	var b = document.getElementById("email");
	var c = document.getElementById("contact");
	var d = document.getElementById("fullname");
	

if(g.length<6)
{
	document.getElementById("err").innerHTML = "minimum length:6";
}
if(g.length>14)
{
	document.getElementById("err").innerHTML = "maximum length:14";
}


	if(z == 6)
	{
		var xmlhttp = new XMLHttpRequest();
		var data = 'fname='+a.value+'&lname='+g.value+'&email='+b.value+'&username='+c.value+'&pwd1='+d.value;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            document.getElementById("txtHint").innerHTML = this.responseText;
	        }
	    };
	    xmlhttp.open("POST", "SignUp_Process.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	}
}
*/