<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); 
?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'raid_id'); ?>
		<?php echo $form->dropDownList($model, 'raid_id', CHtml::listData(Raid::model()->findAll(), 'id', 'name'))?>
		<?php echo $form->error($model,'raid_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event hour'); ?>
		<?php // Time Picker 
			 $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
			     'model'=>$model,
			     'name'=>'event_hour',
			     // additional javascript options for the date picker plugin
			     'options'=>array(
			         'showPeriod'	=>false,
			 		 'showAnim'		=>'drop',
			 		 'defaultTime'  =>'21:00',
			 		 'hours'		=>array('starts'=>8, 'ends'=>23),
			 		 'minutes'		=>array('interval'=>15),
			 		 'amPmText'  	=>array('',''),
			 		 'minuteText'	=>'Min.',
			         ),
			     'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
			 ));
		?>
		
		<?php echo $form->hiddenField($model,'event_date'); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>	

	<div class="row">
		<?php //echo $form->labelEx($model,'raid_leader_id'); ?>
		<?php echo $form->hiddenField($model,'raid_leader_id'); ?>
		<?php echo $form->error($model,'raid_leader_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'event_date'); ?>
		<?php echo $form->hiddenField($model,'event_date'); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->hiddenField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php //echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		
		<?php // redactorjs
			$this->widget('application.extensions.redactorjs.Redactor', array('toolbar'=>'mini', 'model' => $model, 'attribute' => 'description'));
		?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->