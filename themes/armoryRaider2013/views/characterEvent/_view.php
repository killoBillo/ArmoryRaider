<?php
/* @var $this CharacterEventController */
/* @var $data CharacterEvent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('char_id')); ?>:</b>
	<?php echo CHtml::encode($data->char_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available_flag')); ?>:</b>
	<?php echo CHtml::encode($data->available_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('holder_flag')); ?>:</b>
	<?php echo CHtml::encode($data->holder_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_date')); ?>:</b>
	<?php echo CHtml::encode($data->comment_date); ?>
	<br />


</div>