(function() {
	// Top nav search 
	var searcher = $('#search-input')
	searcher.on('keypress', function(e) {
		$('#search-error').hide();
		// When return key is pressed, do query
		if (e.which == 13) {
			if (searcher.val().length > 3) {
				window.location.href = '/shop/search/' + searcher.val();
			}
			else {
				$('#search-error').show();
				return false;
			}
		}
	});
	// Go back link
	// Back link
	$('.go-back').on('click', function(e){
		e.preventDefault();
		window.history.back();
	});
	// Plus/minus menu scroll
	$(".top-menu").on("click", function() {
		$(".list").animate({
			width: "toggle"
		});
	});
	$("#plus").on("click", function() {
		$(this).addClass("hide");
		$("#minus").removeClass("hide");
	});
	$("#minus").on("click", function() {
		$(this).addClass("hide");
		$("#plus").removeClass("hide");
	});

	// Sticky menu at the top
	let path = window.location.pathname;
	if (path.indexOf("shop") == -1) {
		var navBar = $("#topNav");
		$(window).on("scroll", function() {
			if( $(this).scrollTop() > 0) {
				navBar.addClass("navScrolled");
				$(".logo-link").addClass("reset-logo-link");
				$(".logo-main").addClass("reset-logo-main");
				$(".payoff").addClass("reset-payoff");
			}
			else {
				navBar.removeClass("navScrolled");
				$(".logo-link").removeClass("reset-logo-link");
				$(".logo-main").removeClass("reset-logo-main");
				$(".payoff").removeClass("reset-payoff");
			}
		});
	}
	
	// Search bar
	$("#site-search").on("click", function() {
		$(".input-container").animate({
			width: "toggle"
		});
	});
	//Add animation when input is focused
	$(".search-input").on("focus", function () {
		$(this).parent().addClass("animation animation-color");
	});
	
	//Remove animation(s) when input is no longer focused
	$(".search-input").on("focusout", function () {
		if ($(this).val() === "") $(this).parent().removeClass("animation");
		$(this).parent().removeClass("animation-color");
	});
	
	// FB share link
	// target the button and pass in:
	// url - url of the site you want to share
	// title -title of your share
	// discription - description of your share 
	$( ".fb-product-share" ).on("click", function() {
		var title = $(this).attr("data-title");
		var desc = $(this).attr("data-desc").replace("<p>", "").replace("</p>", "");
		var price = $(this).attr("data-price");
		var description = 'Get this ' + desc + ' for only R' + price;
		var slug = $(this).attr("data-slug");
		var url = window.location.href + 'shop/' + slug;
		fbShare(url, title, description);
	});

	// Facebook Share button popup with a window 
	function fbShare(url, title, desc) {
	var windowHeight = 350,
		windowWidth = 520,  
		alignTop = (screen.height / 2) - (windowHeight / 2),
		alignLeft = (screen.width / 2) - (windowWidth / 2),
		facebookShareUrl = 'https://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + desc + '&p[url]=' + url;

		// how to open a window - https://www.w3schools.com/jsref/met_win_open.asp
		window.open( facebookShareUrl, "","top=" + alignTop + ",left=" + alignLeft + ",width=" + windowWidth +",height=" + windowHeight);
	}

	var	$window = $(window),
		$body = $('body'),
		$wrapper = $('#wrapper'),
		$header = $('#header'),
		$footer = $('#footer'),
		$main = $('#main'),
		$main_articles = $main.children('article');

	// Breakpoints.
	breakpoints({
		xlarge:   [ '1281px',  '1680px' ],
		large:    [ '981px',   '1280px' ],
		medium:   [ '737px',   '980px'  ],
		small:    [ '481px',   '736px'  ],
		xsmall:   [ '361px',   '480px'  ],
		xxsmall:  [ null,      '360px'  ]
	});

	// Play initial animations on page load.
	$window.on('load', function() {
		window.setTimeout(function() {
			$body.removeClass('is-preload');
		}, 100);
	});

	// Fix: Flexbox min-height bug on IE.
	if (browser.name == 'ie') {

		var flexboxFixTimeoutId;

		$window.on('resize.flexbox-fix', function() {

			clearTimeout(flexboxFixTimeoutId);

			flexboxFixTimeoutId = setTimeout(function() {

				if ($wrapper.prop('scrollHeight') > $window.height())
					$wrapper.css('height', 'auto');
				else
					$wrapper.css('height', '100vh');

			}, 250);

		}).triggerHandler('resize.flexbox-fix');

	}

	// Nav.
	var $nav = $header.children('nav'),
		$nav_li = $nav.find('li');

	// Add "middle" alignment classes if we're dealing with an even number of items.
	if ($nav_li.length % 2 == 0) {

		$nav.addClass('use-middle');
		$nav_li.eq( ($nav_li.length / 2) ).addClass('is-middle');

	}

	// Main.
	var	delay = 325,
		locked = false;

	// Methods.
	$main._show = function(id, initial) {

		var $article = $main_articles.filter('#' + id);

		// No such article? Bail.
		if ($article.length == 0)
			return;

		// Handle lock.

		// Already locked? Speed through "show" steps w/o delays.
		if (locked || (typeof initial != 'undefined' && initial === true)) {

			// Mark as switching.
				$body.addClass('is-switching');

			// Mark as visible.
				$body.addClass('is-article-visible');

			// Deactivate all articles (just in case one's already active).
				$main_articles.removeClass('active');

			// Hide header, footer.
				$header.hide();
				$footer.hide();

			// Show main, article.
				$main.show();
				$article.show();

			// Activate article.
				$article.addClass('active');

			// Unlock.
				locked = false;

			// Unmark as switching.
				setTimeout(function() {
					$body.removeClass('is-switching');
				}, (initial ? 1000 : 0));

			return;
		}

		// Lock.
		locked = true;

		// Article already visible? Just swap articles.
		if ($body.hasClass('is-article-visible')) {

			// Deactivate current article.
			var $currentArticle = $main_articles.filter('.active');

			$currentArticle.removeClass('active');

			// Show article.
			setTimeout(function() {

				// Hide current article.
				$currentArticle.hide();

				// Show article.
				$article.show();

				// Activate article.
				setTimeout(function() {

					$article.addClass('active');

					// Window stuff.
					$window
						.scrollTop(0)
						.triggerHandler('resize.flexbox-fix');

					// Unlock.
					setTimeout(function() {
						locked = false;
					}, delay);

				}, 25);

			}, delay);
		}
		else {
			// Otherwise, handle as normal.
			// Mark as visible.
			$body
				.addClass('is-article-visible');

			// Show article.
			setTimeout(function() {

				// Hide header, footer.
				$header.hide();
				$footer.hide();

				// Show main, article.
				$main.show();
				$article.show();

				// Activate article.
				setTimeout(function() {

					$article.addClass('active');

					// Window stuff.
					$window
						.scrollTop(0)
						.triggerHandler('resize.flexbox-fix');

					// Unlock.
					setTimeout(function() {
						locked = false;
					}, delay);

				}, 25);

			}, delay);
		}

		// Initialize calendar 
		$('#availability').datetimepicker({
			minDate: 0,
			maxDate: '+1970/01/06',
			weekends: ['01.01.2020'],
			allowTimes: [
				'09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'
			]
		}).on('change dp.change', function(e){
			$('.availability-error').hide();
			$(this).removeClass('input-has-error');
		});

		// Handle service type chnages
		$('#service-type').on('change', function() {
			// Hide errors
			$('.service-error').hide();
			$(this).removeClass('input-has-error');

			if(this.value == 'Reading'){
				$('#total-due').html('R700.00');
			}
			else if(this.value == 'Medium'){
				$('#total-due').html('R1 000.00');
			}
			else if(this.value == 'Both'){
				$('#total-due').html('R1 500.00');
			}
			else {
				$('#total-due').html('R0.00');
			}
		});

		// Warn other areas
		$('#location-other').on('click', function() {
			$('.other-areas').show();
		});
		$('#location-eku, #location-jhb').on('click', function() {
			$('.other-areas').hide();
		});

		// On booking form reset
		$("input[type='reset']").closest('#booking-form').on('reset', function() {
			$('input, select').removeClass('input-has-error');
			$('.availability-error').hide();
			$('#total-due').html('R0.00');
			$('.service-error').hide();
			$('.number-error').hide();
			$('.other-areas').hide();
			$('.name-error').hide();

			// Go to 1st field
			$('#fullname').focus();
		});

		// Booking form submit
		$('#submit-booking').on('click', function(e) {
			// Stop propagation
			e.preventDefault();

			// Get values
			let $name = $('#fullname').val(),
				$phone = $('#phone-number').val(),
				$service = $('#service-type').val(),
				$availability = $('#availability').val();

			// Validate
			if ($name.length < 5) {
				$('#fullname').addClass('input-has-error').focus();
				$('.name-error').show();
				return false;
			}
			else if ($phone.length == 0) {
				$('#phone-number').addClass('input-has-error').focus();
				$('.number-error').show();
				return false;
			}
			else if ($service == 0) {
				$('#service-type').addClass('input-has-error').focus();
				$('.service-error').show();
				return false;
			}
			else if($availability == '') {
				$('#availability').addClass('input-has-error').focus();
				$('.availability-error').show();
				return	false;
			}
			else {
				// get all form data
				let values = $('#booking-form').serialize();

				// Show wait message
				$('span.loader').html('<i class="fas fa-spinner fa-pulse fa-5x"></i> <br />Hang tight, we\'ll be done with your booking in a short while.');
				$('.wait-msg').css('display', 'table');
				
				$.ajax({
					url: "./src/Controller/Controller.php",
					type: "post",
					data: values,
					success: function (response) {
						// Hide wait message
						$('.wait-msg').css('display', 'none');

						// console.log (response);
						// return false;
						
						// Booking success
						let success = JSON.parse(response);
						$('#generated-reference').html(success['reference']);
						// console.log(success);
						
						// Hide form
						$('#booking-form').hide();

						// Show success
						$('#booking-success').show();
						
						// Thank you message
						$('#thanks-msg').html('<p>Thank you, ' + success['fullname'] + ', for your booking with Great Prophetess Vee.\
							You will receive a call confirming your booking on your number: <strong>' + success['phone-number'] + '</strong>.</p>' +
							'<p>In the meantime, please finalise the booking by paying the total due <strong>(' + success ['to-pay'] + ')</strong> \
							 for your booking. Please use this reference number <strong>(' + success['reference'] + ')</strong>, when making the payment.' +
							 '. See you on ' + success['availability'] + '</p>');
						return false;
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			}
		});

		// Contact form submit
		$('#send-contact').on('click', function(e) {
			// Stop propagation
			e.preventDefault();

			// Get values
			let $name = $('#contact-name').val(),
				$email = $('#contact-email').val(),
				$message = $('#contact-message').val();

			// Validate fields
			if ($name.length < 5) {
				$('#contact-name').addClass('input-has-error').focus();
				$('.name-error').show();
				return false;
			}
			else if ($email.length < 8 || !isEmail($email))
			{
				$('#contact-email').addClass('input-has-error').focus();
				$('.email-error').show();
				return false;
			}
			else if ($message.length < 200)
			{
				$('#contact-message').addClass('input-has-error').focus();
				$('.message-error').show();
				return false;
			}
			else {
				// get all form data
				let values = $('#contact-form').serialize();

				// Show wait message
				$('span.loader').html('<i class="fas fa-spinner fa-pulse fa-5x"></i> <br />Hang tight, we\'re sending your message through to the Prophetess.');
				$('.wait-msg').css('display', 'table');
				
				$.ajax({
					url: "./src/Controller/Controller.php",
					type: "post",
					data: values,
					success: function (response) {
						// Hide wait message
						$('.wait-msg').css('display', 'none');

						// console.log(response);
						// return false;

						// console.log(response);
						// Hide form
						$('#contact-form').hide();

						// Show success
						$('#contact-success').show();
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			}
		});

		// Check email validity
		$('#contact-email').on('input', function() {
			if (isEmail (this.value)) {
				$('.email-error').hide();
				$(this).removeClass('input-has-error');
			}
		});

		// Check message length
		$('#contact-message').on('input', function() {
			if (this.value.length >= 200) {
				$('.message-error').hide();
				$(this).removeClass('input-has-error');
			}
		});

		// Check email validity
		function isEmail (email) {
			// var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}

		$(".char-textarea").on("keyup", function(event) {
			checkTextAreaMaxLength (this, event);
		});
		
		/*
		Checks the MaxLength of the Textarea
		-----------------------------------------------------
		@prerequisite:	textBox = textarea dom element
						e = textarea event
						length = Max length of characters
		*/
		function checkTextAreaMaxLength(textBox, e) { 
			var maxLength = parseInt($(textBox).data("length"));
			
			if (!checkSpecialKeys(e)) {
				if (textBox.value.length > maxLength - 1) textBox.value = textBox.value.substring(0, maxLength); 
			} 
			$(".char-count").html(maxLength - textBox.value.length);
			
			return true; 
		} 
		/*
		Checks if the keyCode pressed is inside special chars
		-------------------------------------------------------
		@prerequisite:	e = e.keyCode object for the key pressed
		*/
		function checkSpecialKeys(e) {
			if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40) {
				return false;
			}
			else {
				return true;
			}
		}

		// On contact form reset
		$("input[type='reset']").closest('#contact-form').on('reset', function() {
			$('input, select, textarea').removeClass('input-has-error');
			$('.char-count').html('1000');
			$('.message-error').hide();
			$('.email-error').hide();
			$('.name-error').hide();

			// Go to 1st field
			$('#fullname').focus();
		});  

		// Back to form
		$('#back-to-booking, #back-to-contact').on ('click', function() {
			$('#booking-success, #contact-success').hide();
			$('#booking-form, #contact-form').show().trigger("reset");
			
			// Go to 1st field
			$('#fullname').focus();
			$('#contact-name').focus();
		});

		// Check full name
		$('#fullname, #contact-name').on('input', function() {
			if (this.value.length == 0) {
				$('.name-error').hide();
				$(this).removeClass('input-has-error');
			}
			else if (!/^[a-zA-Z\s]+$/.test(this.value)) {
				$('.name-error').show();
				$(this).focus();
				return false;
			}
			else if (/^[a-zA-Z\s]+$/.test(this.value) && this.value.length >= 5) {
				$('.name-error').hide();
				$(this).removeClass('input-has-error');
			}
		});

		// Validate phone number
		$('#phone-number').on('input', function() {
			if (/^[a-zA-Z]+$/.test(this.value)) {
				$('.number-error').show();
				$(this).focus();
				return false;
			}
			else if (/^[0-9]+$/.test(this.value)) {
				$('.number-error').hide();
				$(this).removeClass('input-has-error');
			}
		});

		$("#phone-number").mask("999-999-9999");
		$("#phone-number").on("blur", function() {
			var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
			if( last.length == 3 ) {
				var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
				var lastfour = move + last;
				var first = $(this).val().substr( 0, 9);

				$(this).val( first + '-' + lastfour );
			}
		});
	};

	$main._hide = function(addState) {

		var $article = $main_articles.filter('.active');

		// Article not visible? Bail.
			if (!$body.hasClass('is-article-visible'))
				return;

		// Add state?
			if (typeof addState != 'undefined'
			&&	addState === true)
				history.pushState(null, null, '#');

		// Handle lock.

			// Already locked? Speed through "hide" steps w/o delays.
				if (locked) {

					// Mark as switching.
						$body.addClass('is-switching');

					// Deactivate article.
						$article.removeClass('active');

					// Hide article, main.
						$article.hide();
						$main.hide();

					// Show footer, header.
						$footer.show();
						$header.show();

					// Unmark as visible.
						$body.removeClass('is-article-visible');

					// Unlock.
						locked = false;

					// Unmark as switching.
						$body.removeClass('is-switching');

					// Window stuff.
						$window
							.scrollTop(0)
							.triggerHandler('resize.flexbox-fix');

					return;

				}

			// Lock.
				locked = true;

		// Deactivate article.
			$article.removeClass('active');

		// Hide article.
			setTimeout(function() {

				// Hide article, main.
					$article.hide();
					$main.hide();

				// Show footer, header.
					$footer.show();
					$header.show();

				// Unmark as visible.
					setTimeout(function() {

						$body.removeClass('is-article-visible');

						// Window stuff.
							$window
								.scrollTop(0)
								.triggerHandler('resize.flexbox-fix');

						// Unlock.
							setTimeout(function() {
								locked = false;
							}, delay);

					}, 25);

			}, delay);


	};

	// Articles.
	$main_articles.each(function() {

		var $this = $(this);

		// Close.
			$('<div class="close">Close</div>')
				.appendTo($this)
				.on('click', function() {
					location.hash = '';
				});

		// Prevent clicks from inside article from bubbling.
			$this.on('click', function(event) {
				event.stopPropagation();
			});

	});

	// Events.
	$body.on('click', function(event) {

		// Article visible? Hide.
			if ($body.hasClass('is-article-visible'))
				$main._hide(true);

	});

	$window.on('keyup', function(event) {

		switch (event.keyCode) {

			case 27:

				// Article visible? Hide.
					if ($body.hasClass('is-article-visible'))
						$main._hide(true);

				break;

			default:
				break;

		}

	});

	$window.on('hashchange', function(event) {

		// Empty hash?
			if (location.hash == ''
			||	location.hash == '#') {
				// Prevent default.
				event.preventDefault();
				event.stopPropagation();

				// Hide.
				$main._hide();
			}
			else if ($main_articles.filter(location.hash).length > 0) {
				// Otherwise, check for a matching article.
				// Prevent default.
				event.preventDefault();
				event.stopPropagation();

				// Show article.
				$main._show(location.hash.substr(1));

			}

	});

	// Scroll restoration.
	// This prevents the page from scrolling back to the top on a hashchange.
	if ('scrollRestoration' in history) {
		history.scrollRestoration = 'manual';
	}
	else {

		var	oldScrollPos = 0,
			scrollPos = 0,
			$htmlbody = $('html,body');

		$window
			.on('scroll', function() {

				oldScrollPos = scrollPos;
				scrollPos = $htmlbody.scrollTop();

			})
			.on('hashchange', function() {
				$window.scrollTop(oldScrollPos);
			});

	}

	// Initialize.

	// Hide main, articles.
	$main.hide();
	$main_articles.hide();

	// Initial article.
	if (location.hash != ''
	&&	location.hash != '#')
		$window.on('load', function() {
			$main._show(location.hash.substr(1), true);
	});
})(jQuery);
