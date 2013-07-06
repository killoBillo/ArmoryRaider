<?php
/* @var $this CharacterEventController */
/* @var $model CharacterEvent */
/* @var $form CActiveForm */
	Yii::app()->clientScript->registerScript('wysihtml5', "
		//wysihtml5
		$('#description-textarea').wysihtml5({
			image: false,
			lists: false,
			link: false,
		});
	");
?>
<h4><?php echo Yii::t('locale', 'Edit comment'); ?></h4>

<div class='well'>
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'character-event-form',
		'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
				'class'=>''
			),
	)); 
?>

		<?php echo $form->errorSummary($model, NULL, NULL, array('class'=>'alert alert-error')); ?>

		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo CHtml::textArea('CharacterEvent[comment]', '', array('id'=>'description-textarea', 'class'=>'input-block-level' , 'style'=>'height:200px', 'placeholder'=>$model->comment, 'value'=>$model->comment)); ?>
		<?php echo $form->error($model,'description'); ?>		

		<?php //echo $form->labelEx($model,'comment_date'); ?>
		<?php echo $form->hiddenField($model,'comment_date', array('value'=>date('Y-m-d H:i:s'))); ?>
		<?php //echo $form->error($model,'comment_date'); ?>

		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('locale', 'Sign up') : Yii::t('locale', 'Update'), array('class'=>'btn')); ?>

<?php $this->endWidget(); ?>
</div><!-- /well -->



<!-- Bootstrap Switch sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrapSwitch.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrapSwitch.js"></script>

<!-- Bootstrap wysihtml5 sources -->
<link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-wysihtml5.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-wysihtml5.js"></script>
