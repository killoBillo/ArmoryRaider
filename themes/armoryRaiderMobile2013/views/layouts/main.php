<?php /* @var $this Controller */
 
Yii::app()->clientScript->registerScript('popovers', "
	$('.notify-icon').popover({
		trigger: 'hover',
		placement: 'bottom',
		container: 'body',
		html: true,
		title: '".Yii::t('locale', 'Planned events')."',
		content: function() {
			return $(this).find('.popover-content').html();
		}
	});
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- enable full page for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- disable IE compatibility mode -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="ArmoryRaider" content="A PHP Raider for World of WarCraft linked with Blizzard Armory">
	
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/snap.css">
	
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css">
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/mobile.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/calendar.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/datepicker.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/social-buttons.css">
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto'>
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto+Slab'>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div class="snap-drawers">
        <div class="snap-drawer snap-drawer-left">
            <div>
                <!-- renderizzo la sidebar -->
                <?php $this->renderPartial('/layouts/_sidebar'); ?>
            </div>
        </div>
        <div class="snap-drawer snap-drawer-right">
            <nav id="navmenu">
                <h3 class="title"><?php echo Yii::t('locale', 'Main Menu')?></h3>
                <!-- my_menu menu -->
                <?php
                if(!Yii::app()->user->isGuest && isset($this->raiderMenu)) {
                    $this->widget('zii.widgets.CMenu', $this->raiderMenu->getMenu());
                }
                ?>
                <!-- /my_menu menu -->
                <!-- logout menu -->
                <?php
                if(!Yii::app()->user->isGuest && isset($this->raiderMenu)) {
                    $this->widget('zii.widgets.CMenu', $this->raiderMenu->getLogOutMenu());
                }
                ?>
                <!-- /logout menu -->
            </nav>
        </div>
    </div>

    <div id="wrap" class="snap-content">
    	<div id="pushContent"></div>

	    <!-- NAVBAR -->
	    <div class="topbar"> <!-- add navbar-inverse class for a black navbar -->
	      <div class="topbar-inner">
            <i id="open-left" class="icon icon-user pull-left"></i>
            <i id="open-right" class="icon icon-reorder pull-right"></i>
	      </div>
	    </div><!-- /navbar --> 



		<div class="container-fluid">		
			
			<!-- Sidebar & Content -->
		  	<div class="row-fluid">	
				<div id="wrapper" class="span12">
					<?php echo $content; ?>
					<div class="clearbox clearfix"></div>
				</div><!-- /wrapper -->
		 	</div><!-- Fine Sidebar & Content -->
			
		</div><!-- /container -->
      
        <div id="footer" class="row-fluid">
            <div class="container span12">
                <p class="muted credit">
                    ArmoryRaider &copy; <?php echo Yii::t('locale', 'is a product developed by'); ?>
                    <a href="http://www.killodesign.com">Marco Chillemi</a><br>
                    <?php echo sprintf(Yii::t('locale', 'Rome - Italy, %d.'), date('Y')); ?>
                    <?php echo ' V'.Yii::app()->params->version.'.'; ?>
                </p>
            </div>
        </div><!-- footer -->

    </div><!-- /wrap -->


	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/snap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/mobile.js"></script>
</body>
</html>
