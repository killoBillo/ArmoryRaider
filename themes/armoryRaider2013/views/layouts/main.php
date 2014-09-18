<?php /* @var $this Controller */ ?>
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
	
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/calendar.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/datepicker.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/social-buttons.css">
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto'>
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto+Slab'>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<!--
		mobile CSS rules resource. 
		http://zsprawl.com/iOS/2012/03/css-for-iphone-ipad-and-retina-displays/ 
	-->
	
	<!-- Mobile Styles -->
	<style>
		/* Landscape phone to portrait tablet */
		@media (max-width: 767px) {
			body {
				font-size:12px;
				padding: 0;
			}
			#pushContent {
				display:none;
			}			
			.navbar .brand {
				font-size: small;
			}			
			#wrap > .container-fluid {
			 	margin-top: 0;
			}	
			.navbar-fixed-top {
			    margin: 0;
			}
			#wrapper-calendario,
			#content-single-page,
			#content-under-calendar,
			#sidebar {
				padding: 0 20px;
				width: auto;
			}
			.dashboard-box-full .raid-infos {
				padding: 0 10px;
				float: left;
			}	
		}
		
		/* Landscape phones and down */
		@media (max-width: 480px) and (orientation:portrait) {
			body {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 10px !important;
			} 
			#pushContent {
				display:none;
			}						
			.navbar .brand {
				color: #000;
			}			
			.calendar-tools .pull-left,
			.calendar-tools .pull-right {
				float:none;
			}	
			.choose-date {
				margin-bottom: 5px;
			}
			#wrapper-calendario,
			#content-single-page,
			#content-under-calendar,			
			#sidebar {
				padding: 0 20px;
				width: auto;
			}
			#footer {
				font-size: 9px !important;
			}
			.dashboard-box-full .raid-infos {
				padding: 0 5px;
				float: left;
			}			
		}
		
		
		/* Non-Retina */
		@media screen and (-webkit-max-device-pixel-ratio: 1) {
		}
		
		/* Retina */
		@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
		only screen and (-o-min-device-pixel-ratio: 3/2),
		only screen and (min--moz-device-pixel-ratio: 1.5),
		only screen and (min-device-pixel-ratio: 1.5) {
		}
		
		/* iPhone Portrait */
		@media screen and (max-device-width: 480px) and (orientation:portrait) {
		} 
		
		/* iPhone Landscape */
		@media screen and (max-device-width: 480px) and (orientation:landscape) {
		}
		
		/* iPad Portrait */
		@media screen and (min-device-width: 481px) and (orientation:portrait) {
		}
		
		/* iPad Landscape */
		@media screen and (min-device-width: 481px) and (orientation:landscape) {
		}
	</style>
</head>

<body>

    <div id="wrap">
    	<div id="pushContent"></div>

	    <!-- NAVBAR -->
	    <div class="navbar navbar-inverse navbar-fixed-top"> <!-- add navbar-inverse class for a black navbar -->
	      <div class="navbar-inner">
	        <div class="container-fluid">
	          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="brand" href="<?php echo Yii::app()->createUrl('site/index'); ?>"><?php echo Yii::app()->session['brand']; ?></a>
	          <div class="nav-collapse collapse">
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
	          </div><!--/.nav-collapse -->
	        </div>
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
      
      <div id="pushFooter"></div>
    </div><!-- /wrap -->



	<div id="footer">
		<div class="container">
			<p class="muted credit">
				ArmoryRaider &copy; <?php echo Yii::t('locale', 'is a product developed by'); ?>
				<a href="http://www.killodesign.com">Marco Chillemi</a>, 
				<?php echo sprintf(Yii::t('locale', 'Rome - Italy, %d.'), date('Y')); ?>
				<?php echo ' V'.Yii::app()->params->version.'.'; ?>
			</p>
		</div>
	</div><!-- footer -->
	
	
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-datepicker.js"></script>
</body>
</html>
