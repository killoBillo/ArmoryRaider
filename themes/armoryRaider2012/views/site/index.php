<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('locale', 'Your Wall'); ?></h1>

<?php if(Yii::app()->user->hasFlash('guildCreated')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('guildCreated'); ?>
	</div>
<?php endif; ?>



<?php 

	var_dump('linguaggio configurazione: ',Config::model()->findByPk(1)->locale);
	var_dump('linguaggio utente: ',User::model()->findByPk(Yii::app()->user->id)->profile->locale);
	var_dump('linguaggio applicazione: ',Yii::app()->getLanguage());
	
?>

<?php 
	if(isset($events)) 
		$this->widget('ext.RaiderExt.DashboardEvents',array('events'=>$events)); 
	else{
?>
	<div class="bashboard_entry">
		<?php
			echo '<h3>'.Yii::t('locale', 'You have to setup a Guild to use the raider').'</h3>'; 
			echo CHtml::link(Yii::t('locale','configure Guild'), Yii::app()->createUrl('/guild/create'), array('class'=>'button green'));
		?>
	</div>

<?php 	} ?>