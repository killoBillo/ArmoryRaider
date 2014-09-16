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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- apple mobile devices -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-touch-fullscreen" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<!-- disable IE compatibility mode -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="ArmoryRaider" content="A PHP Raider for World of WarCraft linked with Blizzard Armory">
	
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/font-awesome.min.css">

	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css">
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/snap.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/calendar.css">
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/mobile.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/datepicker.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/social-buttons.css">
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto'>
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto+Slab'>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <div class="snap-drawers">
        <div class="snap-drawer snap-drawer-left">
            <!-- renderizzo la sidebar -->
            <?php $this->renderPartial('/layouts/_sidebar'); ?>
        </div>
        <div class="snap-drawer snap-drawer-right">
            <!-- renderizzo la sidebar di Dx (quella col menù, per intenderci) -->
            <?php $this->renderPartial('/layouts/_sidebarDx'); ?>
        </div>
    </div>

    <div id="wrap">
        <!-- NAVBAR -->
        <div class="topbar">
            <div class="topbar-inner">
                <i id="open-left" class="icon icon-user pull-left"></i>
                <i id="open-right" class="icon icon-reorder pull-right"></i>
                <a class="brand" href="<?php echo Yii::app()->createUrl('site/index'); ?>"><?php echo Yii::app()->session['brand']; ?></a>
            </div>
        </div><!-- /navbar -->

		<div id="snap-content" class="container-fluid snap-content">
            <div class="pushContent"></div>

			<!-- Content -->
		  	<div class="row-fluid">	
				<div id="wrapper" class="span12">
					<?php echo $content; ?>
					<div class="clearbox clearfix"></div>
				</div><!-- /wrapper -->
		 	</div><!-- Content -->

            <!-- Footer -->
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
		</div><!-- /container -->

    </div><!-- /wrap -->



	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/snap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl;?>/js/mobile.js"></script>
</body>
</html>
