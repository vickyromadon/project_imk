	$( document ).ready( function() {
		$( '.uls-trigger' ).uls( {
			onSelect : function( language ) {
				var languageName = $.uls.data.getAutonym( language );
				$( '.uls-trigger' ).text( languageName );
			},
			quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
		} );
	} );

	$(document).ready(function () {
		var mySelect = $('#first-disabled2');

		$('#special').on('click', function () {
		  mySelect.find('option:selected').prop('disabled', true);
		  mySelect.selectpicker('refresh');
		});

		$('#special2').on('click', function () {
		  mySelect.find('option:disabled').prop('disabled', false);
		  mySelect.selectpicker('refresh');
		});

		$('#basic2').selectpicker({
		  liveSearch: true,
		  maxOptions: 1
		});
	});

	addEventListener("load", function(){ 
		setTimeout(hideURLbar, 0); 
	}, false);

	function hideURLbar(){ 
		window.scrollTo(0,1); 
	}

	 $(window).load(function() {
		$("#flexiselDemo3").flexisel({
			visibleItems:1,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 5000,    		
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: { 
				portrait: { 
					changePoint:480,
					visibleItems:1
				}, 
				landscape: { 
					changePoint:640,
					visibleItems:1
				},
				tablet: { 
					changePoint:768,
					visibleItems:1
				}
			}
		});
		
	});