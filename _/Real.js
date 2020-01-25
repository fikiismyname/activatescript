var lazyadsense = !1;
	window.addEventListener("scroll", function() {
		(0 != document.documentElement.scrollTop && !1 === lazyadsense || 0 != document.body.scrollTop && !1 === lazyadsense) && (! function() {
			var e = document.createElement("script");
			e.type = "text/javascript", e.async = !0, e.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
			var a = document.getElementsByTagName("script")[0];
			a.parentNode.insertBefore(e, a)
		}(), lazyadsense = !0)
	}, !0);


	let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
	let active = false;
	const lazyLoad = function() {
		if (active === false) {
			active = true;
			setTimeout(function() {
				lazyImages.forEach(function(lazyImage) {
					if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
						lazyImage.src = lazyImage.dataset.src;
						lazyImage.classList.remove("lazy");
						lazyImages = lazyImages.filter(function(image) {
							return image !== lazyImage;
						});
						if (lazyImages.length === 0) {
							document.removeEventListener("scroll", lazyLoad);
							window.removeEventListener("resize", lazyLoad);
							window.removeEventListener("orientationchange", lazyLoad);
						}
					}
				});
				active = false;
			}, 200);
		}

	};
	document.addEventListener("scroll", lazyLoad);
	window.addEventListener("resize", lazyLoad);
	window.addEventListener("orientationchange", lazyLoad);
	window.onload = function(){
		setTimeout(lazyLoad, 1000)
	};

	var state = false;
	if (state == false) {
		$("#linkloadmore").hide();
		$(window).scroll(function() {
			var bodyHeight = document.body.offsetHeight;
			var footerheight = $(".amp-footer").height();
			var offsetload = bodyHeight - footerheight;
			if ((window.innerHeight + window.scrollY) >= offsetload) {
				if (state == false) {
					loadscroll();
				};
			}
		});
	}

	function loadscroll() {
		if (state == false) {
			state = true;
			$("#linkloadmore").show();
			$('#linkloadmore a span').html('<img src="data:image/gif;base64,R0lGODlhKwALAPAAAKrD2AAAACH5BAEKAAEAIf4VTWFkZSBieSBBamF4TG9hZC5pbmZvACH/C05FVFNDQVBFMi4wAwEAAAAsAAAAACsACwAAAjIMjhjLltnYg/PFChveVvPLheA2hlhZoWYnfd6avqcMZy1J14fKLvrEs/k+uCAgMkwVAAAh+QQBCgACACwAAAAAKwALAIFPg6+qw9gAAAAAAAACPRSOKMsSD2FjsZqEwax885hh3veMZJiYn8qhSkNKcBy4B2vNsa3pJA6yAWUUGm9Y8n2Oyk7T4posYlLHrwAAIfkEAQoAAgAsAAAAACsACwCBT4OvqsPYAAAAAAAAAj1UjijLAg9hY6maalvcb+IPBhO3eeF5jKTUoKi6AqYLwutMYzaJ58nO6flSmpisNcwwjEfK6fKZLGJSqK4AACH5BAEKAAIALAAAAAArAAsAgU+Dr6rD2AAAAAAAAAJAVI4oy5bZGJiUugcbfrH6uWVMqDSfRx5RGnQnxa6p+wKxNpu1nY/9suORZENd7eYrSnbIRVMQvGAizhAV+hIUAAA7"/>');
			var link = $("#Blog1_pagination-old").attr('href');
			if (link !== undefined) {
				$.ajax({
					url: link,
					dataType: 'html',
					success: function(data) {
						var source = $(data).find('.blog-posts').length ? $(data) : $('<div></div>');
						$(".blog-posts").append(source.find('.blog-posts').html());
						$("#linkloadmore").html(source.find('#Blog1_pagination-old').clone());
						$("#linkloadmore").hide();
						lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
						document.addEventListener("scroll", lazyLoad);
						window.addEventListener("resize", lazyLoad);
						window.addEventListener("orientationchange", lazyLoad);
						state = false;
					}
				})
			} else {
				$("#linkloadmore").remove();
			}
		}
	}

	$(".btn-sidebaramp").on("click",function(){$("#sidebar").toggle(100); $(".sidebar-mask").toggle(100); }); $(".sidebar-mask").on("click",function(){$("#sidebar").toggle(100); $(".sidebar-mask").toggle(100); });

	$('li.drop h6').on("click", function() {

		$(this).closest('h6').toggleClass('active');

		var $this = $(this).parent().find('ul');
		$(".item span").not($this).hide();
		$this.toggle();
		return false;

	});

	$("#buttonsearch").on("click",function(){$("#inputsearch").toggle(); $("#headersearch").toggle(); $("#buttoniconsearch").toggle(); $("#buttoniconclose").toggle(); });

	/* $(window).scroll(function(){var sticky = $('#Header1'), scroll = $(window).scrollTop(); if (scroll >= $("#b-section-header").height()) sticky.addClass('fixed'); else sticky.removeClass('fixed'); }); */


	$(window).scroll(function(){if ($(this).scrollTop() > 100) {$('.amp-main-link').fadeIn(); } else {$('.amp-main-link').fadeOut(); } }); $('#scroll').click(function(){$("html, body").animate({ scrollTop: 0 }, 600); return false; });

	function kodein_checkelement(e){return document.getElementById(e)?1:0}function kodein_insertelement(e,n,t){var r=n.parentNode;"after"==t&&r.insertBefore(e,n.nextSibling),"before"==t&&r.insertBefore(e,n)}function kodein_moveElement(e,n,t,r,i,o){if(!kodein_checkelement(r))return!1;var m=document.getElementById(i),d=m.getElementsByTagName(n),l=document.getElementById(r);if(0==t||d.length<0||d.length<t)return m.insertAdjacentElement(o,l),!1;kodein_insertelement(l,d[t-=1],e)}
	function kodein_MoveByID(e,n){var t=document.createDocumentFragment();t.appendChild(document.getElementById(e)),document.getElementById(n).appendChild(t)}