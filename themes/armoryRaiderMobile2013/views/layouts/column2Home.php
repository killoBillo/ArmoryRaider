<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<?php 
//		if(!empty($this->breadcrumbs)) {
//			echo "<div id='breadcrumbs' class='lite-shadow'>";		
//			$this->widget('zii.widgets.CBreadcrumbs', array(
//					'links'=>$this->breadcrumbs,
//			)); 
//			echo "</div>";				
//		}
?><!-- breadcrumbs -->	


<?php
	if(!Yii::app()->session['config']){
		// pubblico per la prima volta tutti gli assets nella cartella ~/images
		Yii::app()->getAssetManager()->publish(RaiderFunctions::getImagesFolderPath(), false, -1, true);
		
		// se non è configurata l'app, la faccio configurare
		echo "<div class='row-fluid'>";
			echo "<div class='span12'>";
				echo "<h1>".Yii::t('locale', 'Configuration step one of two: <small>Setting up the Application</small>')."</h1>";
				echo "<div class='alert alert-block'>";
					echo "<h1>".Yii::t('locale', 'Attention !!')."</h1>";
					echo "<br>";
					echo Yii::t('locale', '<h5>You have to setup the Armory Raider to use it.<br>It will take just <strong>two</strong> mins</h5>');
					echo "<br>";
					echo CHtml::link(Yii::t('locale','Raider Configuration'), Yii::app()->createUrl('/config/create'), array('class'=>'btn btn-success'));
				echo "</div><!-- /alert-block -->";			
			echo "</div>";		
		echo "</div><!-- /row-fluid -->";

	}elseif(!Yii::app()->session['guild']){
		// se non è configurata alcuna gilda, la faccio configurare
		echo "<div class='row-fluid'>";
			echo "<div class='span12'>";
				echo "<h1>".Yii::t('locale', 'Configuration step two of two: <small>Setting up the main Guild</small>')."</h1>";
				echo "<div class='alert alert-block'>";
					echo "<h1>".Yii::t('locale', 'Attention !!')."</h1>";
					echo "<br>";
					echo Yii::t('locale', '<h5>You have to setup a Guild to use the ArmoryRaider</h5>');
					echo "<br>";
					echo CHtml::link(Yii::t('locale','Guild Configuration'), Yii::app()->createUrl('/guild/create'), array('class'=>'btn btn-success'));
				echo "</div><!-- /alert-block -->";
			echo "</div>";
		echo "</div><!-- /row-fluid -->";
		
	}else{
		// se tutto è configurato, mostro il calendario, la sidebar ed il resto.
		
		// apro il content
		echo "<div id='content' class='content span12'>";
				
		// renderizzo il calendario
		$this->renderPartial('/layouts/_calendar');
		
		// altro contenuto sottostante il calendario
		echo "<div id='content-under-calendar' class='span12'>";
			echo $content;
		echo "</div><!-- /content-under-calendar -->";
		echo "<div class='clearbox'></div>";

		// chiudo il content		
		echo "</div><!-- content -->";
		
//		// renderizzo la sidebar
//		$this->renderPartial('/layouts/_sidebar');
	}
	
	
	$this->endContent(); 
?>