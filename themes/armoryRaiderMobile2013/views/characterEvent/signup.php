<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */

$this->breadcrumbs=array(
	'Character Events'=>array('index'),
	'Create',
);
?>

<h1><?php echo Yii::t('locale', 'Raid subscription'); ?></h1>


<?php 
	/**
	 * Se il raid è in una data passata, non permetto l'iscrizione e visualizzo un alert.
	 * Se l'utente non ha ancora aggiunto nessuno PG, non permetto l'iscrizione e visualizzo un alert.
	 */
	if($expired) {
		$html = "<div class='row-fluid'>";
			$html.= "<div class='span9'>";
				$html.= "<div class='alert alert-error'>".Yii::t('locale', 'You cannot signup to the event!')."</div>";
				$html.= "<div class='alert'>";
					$html.= Yii::t('locale', '<h5>The event has expired.</h5>');	
				$html.= "</div>";
			$html.= "</div><!-- /span9 -->";
		$html.= "</div><!-- /row-fluid -->";
		
		echo $html;			
	}elseif(!empty($characters))
		echo $this->renderPartial('_form', array(
			'id'=>$id,
			'model'=>$model,
			'characters'=>$characters,
		)); 
	else {
		$html = "<div class='row-fluid'>";
			$html.= "<div class='span9'>";
				$html.= "<div class='alert alert-error'>".Yii::t('locale', 'You cannot signup to the event yet!')."</div>";
				$html.= "<div class='alert'>";
					$html.= Yii::t('locale', '<h5>No characters found</h5>Create a character using the button below \'Add Character\'.');	
				$html.= "</div>";
			$html.= "</div><!-- /span9 -->";
		$html.= "</div><!-- /row-fluid -->";
		
		$html.= "<div class='row-fluid'>";
			$html.= "<div class='span9'>";
				$html.= "<a class='btn btn-small' href='".Yii::app()->createUrl('Character/create')."'>".Yii::t('locale', 'Add Character')."</a>";
			$html.= "</div><!-- /span9 -->";
		$html.= "</div><!-- /row-fluid -->";		
			
		echo $html;		
	}
?>