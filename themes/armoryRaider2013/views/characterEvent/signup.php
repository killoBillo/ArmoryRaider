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
	if(!empty($characters))
		echo $this->renderPartial('_form', array(
			'id'=>$id,
			'model'=>$model,
			'characters'=>$characters,
		)); 
	else
		$this->widget('ext.RaiderExt.CharactersList',array('userid'=>Yii::app()->user->id));
?>