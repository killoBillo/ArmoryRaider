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

		<?php //echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->hiddenField($model,'event_id', array('value'=>$id)); ?>
		<?php //echo $form->error($model,'event_id'); ?>

		<?php echo $form->labelEx($model,'char_id'); ?>
		<?php echo $form->dropDownList($model, 'char_id', CHtml::listData(RaiderFunctions::getCharacters(), 'id', 'name')); ?>
		<?php echo $form->error($model,'char_id'); ?>
		
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->dropDownList($model, 'role_id', CHtml::listData(Role::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'role_id'); ?>		
		
		<?php echo $form->labelEx($model,'available_flag'); ?>
		<div class="switch" data-on-label="<?php echo Yii::t('locale', 'Yes'); ?>" data-off-label="<?php echo Yii::t('locale', 'No'); ?>">
			<?php echo $form->checkBox($model, 'available_flag', array('checked'=>true)); ?>
			<?php echo $form->error($model,'available_flag'); ?>
		</div>

		<?php //echo $form->labelEx($model,'holder_flag'); ?>
		<?php echo $form->hiddenField($model,'holder_flag', array('value'=>0)); ?>
		<?php //echo $form->error($model,'holder_flag'); ?>

		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo CHtml::textArea('CharacterEvent[comment]', '', array('id'=>'description-textarea', 'class'=>'input-block-level' , 'style'=>'height:200px', 'placeholder'=>Yii::t('locale', 'Insert comment...'))); ?>
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
