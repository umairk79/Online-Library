$(document).ready(function(){
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
	});