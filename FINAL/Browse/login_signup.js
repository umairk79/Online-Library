 var allow=0;
  var usn=0;
  


 function login()
 {
		//AJAX
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("uuuu").value;
		var b = document.getElementById("ppp").value;
		var data = 'username='+a+'&password='+b;
	    xmlhttp.onreadystatechange = function() { 
	        if (this.readyState == 4 && this.status == 200) {  
	            if(this.responseText != ""){  
					document.getElementById("lerror").innerHTML = this.responseText; }
	            else
	            	window.location = "../home/Homepage.php";
	        }
	    };
	    xmlhttp.open("POST","../common/login.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	
}
 function user()
{
		//AJAX
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("username").value;
		
		
		var data = 'username='+a;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != ""){
					var ret=this.responseText;
					if(ret==1){
						allow=1;
					document.getElementById("us").innerHTML = '<span style="color:green"> username available </span>';
					}
					else
	            	document.getElementById("us").innerHTML = "username unavailable";
				}
	        }
	    };
	    xmlhttp.open("POST","../common/update.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
		
}
function forgot()
{	
		var z=0;
		//AJAX
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("mail").value;
		document.getElementById("loading").style.display="block";

	
		var data = '&mail='+a;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != ""){

					document.getElementById("formes").innerHTML = this.responseText;
					document.getElementById("loading").style.display="none";
					document.getElementById("clear").style.display="block";


				}
					
	        }
	    };
		
        document.getElementById("clear").style.display="block";
		document.getElementById("butt").style.display="none";
		document.getElementById("fform").style.display="none";
		document.getElementById("modh").style.display="none";
	    xmlhttp.open("POST","forgot.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
		
	
}
 function validate()
{	

		var z=0;
		//AJAX
		var xmlhttp = new XMLHttpRequest();
		var a = document.getElementById("username").value;
		var b = document.getElementById("password").value;
		var c = document.getElementById("fullname").value;
		var d = document.getElementById("contact").value;
		var e = document.getElementById("email").value;
		var f = document.getElementById("address").value;
		
		if(/^[a-zA-Z\u0020]*$/g.test(c) && c!= "")
	{
		document.getElementById("ff").innerHTML = "";
		z=z+1;
	}
	else if(c== "")
	{

		document.getElementById("ff").innerHTML = "Please enter your Name";
	}
	else
		document.getElementById("ff").innerHTML = "Name should not have number or special characters";
	
	if(/^[a-zA-Z\u00200-9,-/()]*$/g.test(f) && f!= "")
	{
		document.getElementById("aa").innerHTML = "";
		z=z+1;
	}
	else if(f == "")
	{

		document.getElementById("aa").innerHTML = "Please enter your Address";
	}
	else
		document.getElementById("aa").innerHTML = "Address should not have special characters";
	if(e == "")
		document.getElementById("ee").innerHTML = "Please enter your Email-ID";
	else
	{
		document.getElementById("ee").innerHTML = "";
		z=z+1;
	}
	
	if(a != "")
	{
		z=z+1;
		document.getElementById("uu").innerHTML = "";
	}
	else{
		usn=1;
		document.getElementById("uu").innerHTML = "Please enter your Username";
    }
	if(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g.test(b) && b != "")
	{

		document.getElementById("pp").innerHTML = "";
		z=z+1;
	}
	else if(b == "")
		document.getElementById("pp").innerHTML = "Please enter a Password";
	else{
		document.getElementById("pp").innerHTML = "Password should be >=8 characters, with one Upper Case and Special Character";
	}
	if(d.length==10)
	{
		
		document.getElementById("cc").innerHTML = "";
		z=z+1;
	}
	else
	{
		document.getElementById("cc").innerHTML = "Enter a 10 digit phone number";
	}
	if(z==6 && allow==1)
	{
		var data = 'username='+a+'&fullname='+c+'&contact='+d+'&email='+ e +'&password='+b+'&address='+f;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != "")
	            	document.getElementById("reg").innerHTML = this.responseText;
					
	        }
	    };
		
		document.getElementById("okay").style.display="block";
		document.getElementById("signupform").style.display="none";
		document.getElementById("modhead").style.display="none";
	    xmlhttp.open("POST","../common/addtodb.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	
	}	

	
}
 function okay()
{
	setTimeout(function () {
        window.location="../home/guesthome.php";
    }, 100);
}
function okay1()
{
	setTimeout(function () {
        location.reload();
    }, 100);
}

$(document).ready(function() {
			
//MODAL INITIALIZE
	$('#myModal').on('show.bs.modal', function () {
	document.getElementById("uu").innerHTML = "";
	document.getElementById("ff").innerHTML = "";
	document.getElementById("aa").innerHTML = "";
	document.getElementById("ee").innerHTML = "";
	document.getElementById("pp").innerHTML = "";
	document.getElementById("cc").innerHTML = "";
	});
			
				 
});
