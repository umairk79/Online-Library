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