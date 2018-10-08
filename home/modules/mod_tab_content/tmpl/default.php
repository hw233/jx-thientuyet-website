<?php
/**
* @title		tab content Extension
* @website		http://www.Joombest.com
* @copyright	Copyright (C) 2013 Joombest.com. All rights reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die('Restricted access'); // no direct access 

?>
<link rel="stylesheet" type="text/css" href="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/css/settabs.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/css/tab.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/css/bootstrap-responsive.css" />
<?php
// get the document object
$doc = JFactory::getDocument();
// add your stylesheet
$doc->addStyleSheet( 'modules/mod_tab_content/tmpl/css/cttab.css' );
// style declaration
if ($tabstyle == 0){
$doc->addStyleDeclaration( '
	.span9 {
		width: '.$TabWidth.'px;
	}
	.style16-tab.Joombest-tabs-wrap .Joombest-tabs-panel-top {
		border: 4px solid '.$colorTabSelect.';
	}
	.style16-tab .Joombest-tabs-title-top ul.Joombest-tabs-title li.active h3 {
		background: none repeat scroll 0% 0% '.$colorTabSelect.';
	}
' );
}
if ($tabstyle == 1){
$doc->addStyleDeclaration( '
	.span9 {
		width: '.$TabWidth.'px;
	}
	.style16-tab .Joombest-tabs-title-right ul.Joombest-tabs-title li.active h3 {
		background: none repeat scroll 0% 0% '.$colorTabSelect.';
	}
	.style16-tab .Joombest-tabs-title-right ul.Joombest-tabs-title {
		border-left: 4px solid '.$colorTabSelect.';
	}
	.style16-tab.Joombest-tabs-wrap .Joombest-tabs-panel-left {
		border: 4px solid '.$colorTabSelect.';
	}

	.style16-tab.Joombest-tabs-wrap .Joombest-tabs-panel-right {
		border: 4px solid '.$colorTabSelect.';
	}
	.style16-tab .Joombest-tabs-title-left ul.Joombest-tabs-title li.active h3 {
		background: none repeat scroll 0% 0% '.$colorTabSelect.';
	}
	.style16-tab .Joombest-tabs-title-left ul.Joombest-tabs-title {
		border-right: 4px solid '.$colorTabSelect.';
	}
' );
}
?>
<script type="text/javascript" src="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/js/jquerynoconflict.js"></script>
<script type="text/javascript" src="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/js/tabs.min.js"></script>
<script type="text/javascript" src="<?php echo $linkconfi_in_path; ?>/modules/mod_tab_content/tmpl/js/effects.min.js"></script>
<script type="text/javascript">
//joombestnew
jQuery.noConflict();
 jQuery(document).ready(function ($) {
    $(function () {
        $(".main-Joombest-pretty-tab #Joombest-tabs-<?php echo $tabstyleview;?>-<?php echo $classsufix;?> .Joombest-tabs-title-<?php echo $tabstyleview;?>-<?php echo $classsufix;?>").jotabs(".main-Joombest-pretty-tab #Joombest-tabs-<?php echo $tabstyleview;?>-<?php echo $classsufix;?> .Joombest-tabs-content-<?php echo $tabstyleview;?>-<?php echo $classsufix;?>", {
            site_root: 'http://Joombest.com',
            name: '<?php echo $tabstyleview;?>-<?php echo $classsufix;?>',
            swipetouch: true,
            triggerWindowResize: false,
            slidetotab: true,
            tabscroll: true,
            event: 'click',
            effect: 'fade',
            currentItemEasing: 'swing',
            nextItemEasing: 'swing',
            initialIndex: 0,
            history: false,
            ajax: false,
            duration: 400,
            initialEffect: true,
            onLoad: null,
            onBeforeClick: null,
            onClick: null
        });
    });
});
</script>

<div id="tab-contentnew" class="tab-contentnew">
<div class="main-Joombest-pretty-tab">
	<div class="Joombest-tabs-wrap style16-tab" style="width:100%; height:auto; min-width:auto; max-width:auto;">
		<?php 
		switch ($tabstyle) {
			case 0:?>
				<div id="Joombest-tabs-horizontal-<?php echo $classsufix;?>" class="Joombest-tabs-container">
					<div class="Joombest-tabs-title-wrap Joombest-tabs-title-top Joombest-tabs-align-<?php echo $displaystyle; ?>" style="width: auto; height: 36px;">
						<span class="tabscroll-prev" style="display: none;"></span>
						<ul class="Joombest-tabs-title Joombest-tabs-title-horizontal-<?php echo $classsufix;?>">
				<?php
				break;
			case 1:?>
				<div id="Joombest-tabs-vetical-<?php echo $classsufix;?>" class="Joombest-tabs-container">
					<div class="Joombest-tabs-title-wrap Joombest-tabs-title-<?php echo $displaystyle; ?>" style="width:150px; height:auto;">
						<ul class="Joombest-tabs-title Joombest-tabs-title-vetical-<?php echo $classsufix;?>">
				<?php
				break;
		}
		?>
					<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1){ 
						if ($loop == 1){?>
							<li class="first active">
								<h3>
									<span><?php echo $title[$loop]; ?></span>
									<span class="Joombest-tabs-arrow"></span>
									<a class="no-display" href="http://Joombest.com"></a>
								</h3>
							</li>
						<?php }
						else{
							if ($title[$loop] != 'Joombest.com'){
							?>
								<li>
									<h3>
										<span><?php echo $title[$loop]; ?></span>
										<span class="Joombest-tabs-arrow"></span>
										<a class="no-display" href="http://Joombest.com"></a>
									</h3>
								</li>
							<?php
							}
						}}?>
				</ul>
				<span class="tabscroll-next" style="display: none;"></span>
			</div>
			<?php 
			switch ($tabstyle) {
				case 0:?>
					<div class="Joombest-tabs-panel Joombest-tabs-panel-top" style="width:auto; height: auto;">
						<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1){ 
							if ($loop == 1){?>
								<div class="Joombest-tabs-content Joombest-tabs-content-horizontal-<?php echo $classsufix;?> first active" style="display: block;">
									<div class="Joombest-tabs-subcontent">
										<p><?php echo $TabContent[$loop]; ?></p>
									</div>
								</div>
							<?php }
							else{
								if ($title[$loop] != 'Joombest.com'){
								?>
								<div class="Joombest-tabs-content Joombest-tabs-content-horizontal-<?php echo $classsufix;?>" style="display: none;">
									<div class="Joombest-tabs-subcontent">
										<p><?php echo $TabContent[$loop]; ?></p>
									</div>
								</div>
							<?php
							}
						}}?>
					</div>
					<?php
					break;
				case 1:?>
					<div class="Joombest-tabs-panel Joombest-tabs-panel-<?php echo $displaystyle; ?>" style="width:auto; height: auto;">
						<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1){ 
							if ($loop == 1){?>
								<div class="Joombest-tabs-content Joombest-tabs-content-vetical-<?php echo $classsufix;?> first active" style="display: block;">
									<div class="Joombest-tabs-subcontent">
										<p><?php echo $TabContent[$loop]; ?></p>
									</div>
								</div>
							<?php }
							else{
								if ($title[$loop] != 'Joombest.com'){
								?>
								<div class="Joombest-tabs-content Joombest-tabs-content-vetical-<?php echo $classsufix;?>" style="display: none;">
									<div class="Joombest-tabs-subcontent">
										<p><?php echo $TabContent[$loop]; ?></p>
									</div>
								</div>
							<?php
							}
						}}?>
					</div>
					<?php
					break;
			}
			?>
		</div>
	</div>
</div>
</div>