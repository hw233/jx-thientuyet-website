jQuery(document).ready(function(){
	
	if(jQuery("#quickLink").length > 0 ){
		jQuery("#quickLink").addScrollControl({
			initTop : 430,
			offsetTop : 600,
			animation : true,
			offsetToScroll :400,
			offsetLeft : 766,
			RelativeID : "static"
		});
	}
	$('.ScrollTop').click(function() {
		$('html,body').animate({
          scrollTop: 0
        }, 1000);
        return false;
	});
	jQuery(".StaticMain div.MainTab:first ").show();
	jQuery("#tabHeader li").eq(0).addClass("Active");
	jQuery("#tabHeader > li > a").click(function(){
		jQuery(".StaticMain .MainTab").hide();
		jQuery("#tabHeader > li").removeClass("Active");
		jQuery(this).parent().addClass("Active");
		var curId = jQuery(this).attr("href");
		jQuery(".StaticMain").find(curId).show();
		return false;
	});
	$('.Dangky').click(function() {
		zmeOpenWidget.doRegister();
	});
});
