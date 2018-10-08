<!DOCTYPE html>
<head>
<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/systems.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
<link rel="shortcut icon" href="//img.zing.vn/products/jx1/favicon.ico" />
<link rel="stylesheet" href="<?php echo $this->baseurl ;?>/templates/<?php echo $this->template ;?>/css/skin_subpage.css" type="text/css" />
 </head>
 <body>
 	<!--
 	<object style="position:fixed; top:20px; left:-120px; idne" width="1200" height="600"> <embed src="http://img.zing.vn/volamthuphi/images/landing-page/2015/02-quy-doi-tien-dong/swf/flash.swf" width="1200" height="600" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"></object>
    -->
 

<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<style type="text/css">
#toTop {
 display: block;
 position: fixed;
 top: 903px;
 width: 26px;
 height: 103px;
 overflow: hidden;
 right: 0;
 padding: 5px 0;
 text-align: center;
 color: white;
 background: url("http://blogkiemtien.top/wp-content/themes/smartline-lite/images/totop.png") no-repeat;
 border-radius: 3px 0 0 3px;
 z-index: 300;
 display: block;

 }
</style>
<script type="text/javascript">
	
	
	jQuery(document).ready(function($) {
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.backtotop').fadeIn();
			} else {
				$('.backtotop').fadeOut();
			}
		});
		//Click event to scroll to top
		$('.backtotop').click(function(){
			$('html, body').animate({scrollTop : 0},100);
			return false;
		});
	});
	
	
</script>





<a class="backtotop" id="toTop" href="#"></a>-->




 </body>
<?php
// no direct access
defined('_JEXEC') or die;

//check if jaT3 plugin is existed
if(!defined('T3')){
	throw new Exception(JText::_('T3_MISSING_T3_PLUGIN'));
}

$T3 = T3::getApp($this);

// get configured layout
$layout = $T3->getLayout();

$T3->loadLayout ($layout);
