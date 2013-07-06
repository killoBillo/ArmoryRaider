<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="container" class="page">
	<div id="header">
		<div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
		
		<?php if(isset($this->calendar)) { ?>
		<div id="page_date">
			<div class="data">
				<h2>
					<?php echo Yii::app()->DateFormatter->formatDateTime(CDateTimeParser::parse($this->calendar->getDate()->format($this->calendar->getFormat()), 'yyyy-mm-dd'), 'long', null ); ?>
				</h2>
			</div>
		</div>
		
		<div id="calendario" class="wrapper">
			<div class="viewport">
				<?php 
					echo $this->calendar->getHtmlCalendar();
				?>
			</div><!-- /viewport -->
		</div><!-- /calendario -->

		<?php 
			}else print("Modificare il controller:<br />				
				 ...extends RaiderController<br />	
				public function filters()<br />
				{<br />
					return array('rights', );<br />
				}<br />
				<br />
				public function allowedActions() {<br /> 
					return 'index, suggestedTags';<br /> 
				}<br />	
			"); 
		?>
		
	</div><!-- header -->
			
	<div id="user_tools">		
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
		<div class="clearbox"></div>
	</div><!-- user_tools -->

	<div id="breadcrumbs">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	</div>
		
	<div id="content">
		<?php echo $content; ?>
		
		<div class="clearbox"></div>
	</div>
	
	
	<div class="clearbox"></div>

	<div id="footer"><!--
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	--></div><!-- footer -->

</div><!-- page -->

</body>
</html>
