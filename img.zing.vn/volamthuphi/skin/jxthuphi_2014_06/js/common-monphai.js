jQuery(document).ready(function() {
	$('.Dangky').click(function() {
		zmeOpenWidget.doRegister();
	});
	if ( jQuery(".Main > .Sidebar").length >0){	
		jQuery(".MainContent").css( "width","710px");
    }
	jQuery(".StaticMain div.MainTab:first ").show();
	jQuery("#tabHeader li").eq(0).addClass("Active");
	jQuery("#tabHeader > li > a").click(function(){
		jQuery(".StaticMain .MainTab").hide();
		jQuery("#tabHeader > li").removeClass("Active");
		jQuery(this).parent().addClass("Active");
		var curId = jQuery(this).data("id");
		jQuery(".StaticMain").find(curId).show();
		jQuery('.MainContent').jScrollPane({
			scrollbarWidth: 6}
		);
		return false;
	});
	jQuery(".BtMonPhai > li > a").click(function(){
		var curIndex = jQuery(this).parent().index();
		var curId = jQuery(this).data("id");
		jQuery(".StaticMain .MainTab").hide();
		jQuery("#tabHeader > li").removeClass("Active");
		jQuery("#tabHeader li").eq(curIndex).addClass("Active");
		jQuery(".StaticMain").find(curId).show();
		jQuery('.MainContent').jScrollPane({
			scrollbarWidth: 6}
		);
		$(".jScrollPaneContainer").animate({left:"0"},1000);
		$(".MainContentClose").animate({left:"700"},1000);
		
		return false;
	});
	
	jQuery(".MainContentClose").click(function(){
		$(".jScrollPaneContainer").animate({left:"-760"},1000);
		$(".MainContentClose").animate({left:"-50"},1000);
		return false;
	});
	
	
	$(".sliderkit").sliderkit({
		shownavitems:3,
		scroll:1,
		mousewheel:true,
		circular:true,
		start:1
	});
	
})
jQuery(window).load(function(){
	if (jQuery(".MainContent").length > 0) {      
		jQuery('.MainContent').jScrollPane({
			scrollbarWidth: 6}
		);
    }
	
	
	
	var activeMonphai = "Char"+jQuery("#activeSideNav").val().substring(4, 6); 
	jQuery("#wrapper").addClass(activeMonphai);
	
	jQuery(".Description h2.TitleMain").text(jQuery(".StaticTopPanel .TitleMain").text());
	jQuery(".Description").append(jQuery(".Intro").html());
	
});