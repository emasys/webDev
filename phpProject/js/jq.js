function slideNotice(text){
	$('#slideNotice').html('<h3>' + text + '</h3>').slideDown().delay(1500).slideUp();
	};
	$('#reset').click(function(){
		slideNotice('You can now start all over!');
		});
	$('#reg').click(function(){
		slideNotice('your account have been registered!');
		});
	$('#first').focus(function(){
		slideNotice('Enter your first name');
		});
	$('#last').focus(function(){
		slideNotice('Enter your last name');
		});
	$('#username').focus(function(){
		slideNotice('Enter your desired username');
		});
	$('#pass1').focus(function(){
		slideNotice('Enter your password');
		});
	$('#pass2').focus(function(){
		slideNotice('confirm your password');
		});
	$('#email').focus(function(){
		slideNotice('Enter your email address');
		});
		
/*function counter(time, url){
	var interval = setInterval (function(){
		$('#counter').text(time);
		time = time - 1;
		
		if (time == 0) {
			clearInterval(interval);
			window.location = url;
			}
		}, 1000);
	}
	
	$('#reg').click(function(){
		counter(5, 'http://localhost:8080/');
		});*/
		
    	$(document).ready(function(){
				
				$('#reg').hide();
				$('#regkey').click(function(){
					$('#reg').slideDown('fast');
					$('#login').hide();
					});
				$('#logo').mouseenter(function(){
					$('#logo').fadeTo(100,0.7).delay(200).fadeTo(100,1);
					});
					
				$('.thumbs').css('opacity', '0.7');
				$('.thumbs').mouseover(function() {
					$(this).fadeTo(300,1);
					$('.thumbs').not(this).fadeTo(300, 0.7);
					});
					
				$('.link').mouseover(function() {
					$(this).hide().fadeIn(100);
					//$('.link').not(this).removeClass('active');
					});
				/*$('.link').mouseleave(function() {
					$(this).removeClass('active');
					//$('.link').not(this).removeClass('active');
					});*/
				//$('#form').hide();
				$('#showForm').click(function(){
					
					$('#form').fadeIn('slow');
					$('#showForm').hide();
					});
			$('.custom-container').hide().fadeIn(800);
			
			});
			
			
		
		