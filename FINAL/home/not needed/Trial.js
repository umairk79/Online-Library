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
	            if(this.responseText != "")
	            	document.getElementById("txtHint").innerHTML = this.responseText;
	            else
	            	window.location = "Homepage.php";
	        }
	    };
	    xmlhttp.open("POST","login.php", true);
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
	    xmlhttp.open("POST","update.php", true);
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
		var data = 'username='+a+'&fullname='+c+'&contact='+d+'&email='+ e +'&password='+b;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	            if(this.responseText != "")
	            	document.getElementById("reg").innerHTML = this.responseText;
					
	        }
	    };
		
		document.getElementById("okay").style.display="block";
		document.getElementById("signupform").style.display="none";
		document.getElementById("modhead").style.display="none";
	    xmlhttp.open("POST","addtodb.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	
	}	

	
}
 function okay()
{
	setTimeout(function () {
        location.reload()
    }, 100);
}

//*********************************JQUERY**************************************//
		$(document).ready(function() {
			$(".owl-carousel").each(function() {
			  var $this = $(this);
			  $this.owlCarousel({
				items : 4, //10 items above 1000px browser width
				itemsDesktop : [1000,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,3], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
			  });
			  // Custom Navigation Events
			  $this.parent().find(".next").click(function(){
				$this.trigger('owl.next');
			  });
			  $this.parent().find(".prev").click(function(){
				$this.trigger('owl.prev');
			  });
			});
			/*var owl = $(".owl-demo");
			 
			owl.owlCarousel({
				items : 4, //10 items above 1000px browser width
				itemsDesktop : [1000,5], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,3], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
			});
			 
			// CAROUSEL NAVIGATION
			$(".next").click(function(){
				$(this).owl.trigger('owl.next');
			})
			$(".prev").click(function(){
				$(this).owl.trigger('owl.prev');
			})*/
			
			//LIVE BOOKS SEARCH FUNCTION
			$(function(){
				$("#search").keyup(function() 
				{ 
				var searchid = $(this).val();
				var dataString = 'search='+ searchid;
				if(searchid!='')
				{
					$.ajax({
					type: "POST",
					url: "search.php",
					data: dataString,
					cache: false,
					success: function(html)
					{
					$("#result").html(html).show();
					}
					});
				}return false;    
				});

				jQuery("#result").live("click",function(e){ 
					var $clicked = $(e.target);
					var $name = $clicked.find('.name').html();
					var decoded = $("<div/>").html($name).text();
					$('#search').val(decoded);
				});
				jQuery(document).live("click", function(e) { 
					var $clicked = $(e.target);
					if (! $clicked.hasId("search")){
					jQuery("#result").fadeOut(); 
					}
				});
				$('#search').click(function(){
					jQuery("#result").fadeIn();
				});
			});
			//MODAL INITIALIZE
			$('#myModal').on('show.bs.modal', function () {
			  document.getElementById("uu").innerHTML = "";
			  document.getElementById("ff").innerHTML = "";
			  document.getElementById("aa").innerHTML = "";
			  document.getElementById("ee").innerHTML = "";
			  document.getElementById("pp").innerHTML = "";
			  document.getElementById("cc").innerHTML = "";
			});
			
			//POPOVER
			$('[data-toggle="popover"]').popover(); 
			 
			 
			 $('.book').popover({
				html: true,
				placement: "bottom",
				container: 'body',
				trigger: "manual",
				content: function(){
					var div_id =  "tmp-id-" + $.now();
					return details_in_popup($(this).attr('id'), div_id);
				}
			}).on("mouseenter", function () {
				var _this = this;
				$(this).popover("show");
				$(".popover").on("mouseleave", function () {
					$(_this).popover('hide');
				});
			}).on("mouseleave", function () {
				var _this = this;
				setTimeout(function () {
					if (!$(".popover:hover").length) {
						$(_this).popover("hide");
					}
				}, 300);
			});

			function details_in_popup(id, div_id){
				$.ajax({
					url: "popup.php",
					type:"POST",
					data:{id:id},
					success: function(response){
						$('#'+div_id).html(response);
					}
				});
				return '<div id="'+ div_id +'">Loading...</div>';
			}
			  
			  
			 
		});