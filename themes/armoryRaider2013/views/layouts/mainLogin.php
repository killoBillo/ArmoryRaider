<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html ang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css">
	<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/login.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab&subset=latin-ext' rel='stylesheet' type='text/css'>

	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-datepicker.js"></script>
		
	<meta name="ArmoryRaider" content="A PHP Raider for World of WarCraft linked with Blizzard Armory">
	
	<!-- Mobile Styles -->
	<style>
		/* Landscape phone to portrait tablet */
		@media (max-width: 767px) {
			body {
				font-size:12px;
				padding: 0;
			}
		}
		
		/* Landscape phones and down */
		@media (max-width: 480px) and (orientation:portrait) {
			body {
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
				font-size: 10px !important;
			} 
		}

	</style>	
</head>

<body>
	<div class="container">
	
		<?php echo $content; ?>
	
	</div><!-- /container -->
</body>
</html>
