var winWidth = $(window).width();
var winHeight = $(window).height();
var scaleWidth = winWidth / 2000;
var scaleHeight = winHeight / 1000;
var flashWidth = 2000;
var flashHeight = 1000;
var flashLeft = 0;

logo =  [227, 172, 35, 0];
cta01 =  [300, 390, 562, 441];
cta02 =  [300, 390, 562, 441 + 280];
cta03 =  [300, 390, 562, 441 + 280*2];
cta04 =  [300, 390, 562, 441 + 280*3];
watchClip =  [438, 149, 441, 790];


function IntitContent() {
    winWidth = $(window).width();
    winHeight = $(window).height();
    scaleWidth = winWidth / 2000;
    scaleHeight = winHeight / 1000;
    flashLeft = 0;
    if (scaleWidth > scaleHeight) {
        flashWidth = 2000 * scaleWidth;
        flashHeight = 1000 * scaleWidth;
    } else {
        flashWidth = 2000 * scaleHeight;
        flashHeight = 1000 * scaleHeight;
        flashLeft = (flashWidth - winWidth) / -2;
        scaleWidth = scaleHeight;
    }
   
	$(".Header").css({
        'width': flashWidth,
        'height': flashHeight,
        'left': flashLeft
    });
	$("#wrapper h1 a").css({
		"display" : "block",
        'width': logo[0] * scaleWidth,
        'height': logo[1] * scaleWidth,
        'top': logo[2] * scaleWidth
    });
	$(".cta li:eq(0) a").css({
		"display" : "block",
        'width': cta01[0] * scaleWidth,
        'height': cta01[1] * scaleWidth,
        'top': cta01[2] * scaleWidth,
        'left': cta01[3] * scaleWidth
    });
	$(".cta li:eq(1) a").css({
		"display" : "block",
        'width': cta02[0] * scaleWidth,
        'height': cta02[1] * scaleWidth,
        'top': cta02[2] * scaleWidth,
        'left': cta02[3] * scaleWidth
    });
	$(".cta li:eq(2) a").css({
		"display" : "block",
        'width': cta03[0] * scaleWidth,
        'height': cta03[1] * scaleWidth,
        'top': cta03[2] * scaleWidth,
        'left': cta03[3] * scaleWidth
    });
	$(".cta li:eq(3) a").css({
		"display" : "block",
        'width': cta04[0] * scaleWidth,
        'height': cta04[1] * scaleWidth,
        'top': cta04[2] * scaleWidth,
        'left': cta04[3] * scaleWidth
    });
	$(".watchClip").css({
		"display" : "block",
        'width': watchClip[0] * scaleWidth,
        'height': watchClip[1] * scaleWidth,
        'top': watchClip[2] * scaleWidth,
        'left': watchClip[3] * scaleWidth
    });
}
$(window).bind('resize', function(e) {
    IntitContent()

});
$(window).bind('load', function(e) {
    IntitContent()

});
jQuery(document).ready(function() {
	jQuery('.watchClip').on('click', function(event) {
        _urlClip = jQuery(this).data('href');
        OpenVideo(_urlClip);
    });
});


	function OpenVideo(urlClip) {
        $.fancybox({
            arrows: false,
            helpers: {
                media: true
            },
            youtube: {
                autoplay: 1
            },
            href: urlClip,
            beforeShow: function(a, b, c, d) {}
        });
    }